import { spawn } from 'child_process';

const chromeOrBravePath = '/Applications/Brave Browser.app/Contents/MacOS/Brave Browser';
const port = 9345;
const targetUrl = process.argv[2] || 'https://eathways.test/demo';

const browser = spawn(chromeOrBravePath, [
    `--remote-debugging-port=${port}`,
    '--headless=new',
    '--disable-gpu',
    '--no-sandbox',
    '--window-size=390,844',
    '--ignore-certificate-errors',
    'about:blank'
]);

await new Promise(r => setTimeout(r, 1500));

try {
    const listRes = await fetch(`http://127.0.0.1:${port}/json/list`);
    const pages = await listRes.json();
    const ws = new WebSocket(pages[0].webSocketDebuggerUrl);
    await new Promise(r => ws.onopen = r);

    let id = 1;
    const send = (method, params = {}) => new Promise((resolve, reject) => {
        const msgId = id++;
        const handler = (evt) => {
            const data = JSON.parse(evt.data);
            if (data.id === msgId) {
                ws.removeEventListener('message', handler);
                if (data.error) reject(data.error);
                else resolve(data.result);
            }
        };
        ws.addEventListener('message', handler);
        ws.send(JSON.stringify({ id: msgId, method, params }));
    });

    await send('Page.enable');
    await send('Network.enable');
    await send('Emulation.setDeviceMetricsOverride', {
        width: 390,
        height: 844,
        deviceScaleFactor: 3,
        mobile: true
    });

    // Emulate Mobile 4G Throttling: 1.6 Mbps download, 750 kbps upload, 150ms latency
    await send('Network.emulateNetworkConditions', {
        offline: false,
        latency: 150,
        downloadThroughput: (1.6 * 1024 * 1024) / 8,
        uploadThroughput: (750 * 1024) / 8
    });
    await send('Emulation.setCPUThrottlingRate', { rate: 4 });

    console.log(`Auditing: ${targetUrl} (Mobile 4G Throttled)...`);
    await send('Page.navigate', { url: targetUrl });
    await new Promise(r => setTimeout(r, 6000));

    const metrics = await send('Runtime.evaluate', {
        expression: `
            (() => {
                const nav = performance.getEntriesByType('navigation')[0];
                const paint = performance.getEntriesByType('paint');
                const fcp = paint.find(p => p.name === 'first-contentful-paint');
                return {
                    responseEndMs: Math.round(nav.responseEnd),
                    domInteractiveMs: Math.round(nav.domInteractive),
                    fcpMs: fcp ? Math.round(fcp.startTime) : null
                };
            })()
        `,
        returnByValue: true
    });

    const lcp = await send('Runtime.evaluate', {
        expression: `
            new Promise(r => {
                new PerformanceObserver(list => {
                    const last = list.getEntries().pop();
                    r({ lcpTimeMs: Math.round(last.startTime), url: last.url });
                }).observe({ type: 'largest-contentful-paint', buffered: true });
                setTimeout(() => r({ error: 'timeout' }), 2000);
            })
        `,
        awaitPromise: true,
        returnByValue: true
    });

    const cls = await send('Runtime.evaluate', {
        expression: `
            new Promise(r => {
                let score = 0;
                new PerformanceObserver(list => {
                    for (const entry of list.getEntries()) {
                        if (!entry.hadRecentInput) score += entry.value;
                    }
                }).observe({ type: 'layout-shift', buffered: true });
                setTimeout(() => r({ clsScore: Math.round(score * 1000) / 1000 }), 1000);
            })
        `,
        awaitPromise: true,
        returnByValue: true
    });

    console.log('\n--- Mobile 4G Performance Audit Results ---');
    console.table({ ...metrics.result.value, ...lcp.result.value, ...cls.result.value });

    ws.close();
} finally {
    browser.kill();
}
