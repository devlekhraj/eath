<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>EATH Ways — Website Preview Ready</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f8fafc; color: #0f172a; margin: 0; padding: 2rem; }
        .website-card { max-width: 600px; margin: 2rem auto; background: #fff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 2rem; }
        .badge { display: inline-block; background: #e0f2fe; color: #0369a1; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; margin-bottom: 1rem; }
        .disclosure { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; padding: 0.75rem 1rem; border-radius: 6px; font-size: 0.875rem; margin: 1rem 0; }
        h1 { margin: 0 0 0.5rem; font-size: 1.5rem; }
        p { color: #475569; line-height: 1.6; }
        ul { color: #334155; line-height: 1.8; }
    </style>
</head>
<body>
    <div class="website-card">
        <span class="badge">EATH Full-Site Website</span>
        <h1>Website Preview Initialized</h1>
        <div class="disclosure">
            Website preview — sample trips, prices and availability. No booking or inquiry will be sent.
        </div>
        <p>Phase 02 data foundation & isolation layer successfully active:</p>
        <ul>
            <li><strong>Isolated View Layer:</strong> <code>packages/website/resources/views/website/</code> (zero database queries)</li>
            <li><strong>Shared Fixtures:</strong> {{ $treks_count }} treks, 5 regions, 6 experiences, 24 departures</li>
            <li><strong>Calendar Context:</strong> {{ $disclosure }} ({{ $calendar_date }})</li>
            <li><strong>Security:</strong> Scoped session storage, <code>noindex, nofollow</code> headers active</li>
        </ul>
    </div>
</body>
</html>
