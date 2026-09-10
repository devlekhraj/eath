<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <title>EATH Ways — Website Design System & Primitives Review</title>

    <!-- Google Fonts: Newsreader 500, 600, 700 + Inter 400, 500, 600, 700 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Newsreader:opsz,wght@6..72,500;6..72,600;6..72,700&display=swap" rel="stylesheet">

    @vite(['packages/website/resources/website/scss/website-preview.scss'])
</head>
<body class="eath-website">
    <header class="website-section--compact" style="border-bottom: 1px solid var(--color-border); background: var(--color-surface);">
        <div class="website-container">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: var(--space-4);">
                <div>
                    <span class="website-badge website-badge--primary">Design System Phase 03</span>
                    <h1 class="website-h3" style="margin-top: var(--space-2);">EATH Website Visual Primitives Review</h1>
                    <p class="website-caption website-text-secondary" style="margin: var(--space-1) 0 0;">
                        Strict zero-shadow policy, Newsreader + Inter fluid scales, accessible controls.
                    </p>
                </div>
                <div style="display: flex; gap: var(--space-2);">
                    <a href="{{ route('website.home') }}" class="website-btn website-btn--outline website-btn--compact">
                        Back to Website Home
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="website-container" style="padding-top: var(--space-8); padding-bottom: var(--space-16);">
        <!-- 1. Typography Showcase -->
        <section class="website-card" style="margin-bottom: var(--space-8);">
            <div class="website-badge website-badge--warm" style="margin-bottom: var(--space-3);">01. Fluid Typography</div>
            <h2 class="website-h4" style="margin-bottom: var(--space-4);">Type Hierarchy &amp; Fluid Scale</h2>

            <div style="display: flex; flex-direction: column; gap: var(--space-4);">
                <div>
                    <span class="website-micro website-text-muted">--type-display (clamp 40px -> 64px, Newsreader)</span>
                    <div class="website-display">The Great Himalayan Traverse</div>
                </div>
                <hr class="website-divider">
                <div>
                    <span class="website-micro website-text-muted">--type-h1 (clamp 34px -> 48px, Newsreader)</span>
                    <div class="website-h1">Explore Everest &amp; Annapurna High Passes</div>
                </div>
                <hr class="website-divider">
                <div>
                    <span class="website-micro website-text-muted">--type-h2 (clamp 30px -> 40px, Newsreader)</span>
                    <div class="website-h2">Curated Journeys Across Sacred Alpine Valleys</div>
                </div>
                <hr class="website-divider">
                <div>
                    <span class="website-micro website-text-muted">--type-h3 (clamp 24px -> 32px, Newsreader)</span>
                    <div class="website-h3">Safety-First Acclimatization Pacing</div>
                </div>
                <hr class="website-divider">
                <div>
                    <span class="website-micro website-text-muted">--type-h4 (clamp 21px -> 24px, Newsreader)</span>
                    <div class="website-h4">Sample Departure Calendar &amp; Trailhead Details</div>
                </div>
                <hr class="website-divider">
                <div>
                    <span class="website-micro website-text-muted">--type-card-title (clamp 20px -> 24px, Newsreader)</span>
                    <div class="website-card-title">Everest Base Camp &amp; Gokyo Lakes Expedition</div>
                </div>
                <hr class="website-divider">
                <div>
                    <span class="website-micro website-text-muted">--type-body-large (clamp 17px -> 18px, Inter 400)</span>
                    <p class="website-body-large" style="margin: 0;">
                        Every journey is paced deliberately to allow natural acclimatization, respectful cultural connection, and restorative valley rest days.
                    </p>
                </div>
                <hr class="website-divider">
                <div>
                    <span class="website-micro website-text-muted">--type-body (16px, Inter 400)</span>
                    <p class="website-body" style="margin: 0;">
                        All website itineraries, availability dates, and USD rates are illustrative UI test inputs. Commercial bookings and inquiry transmissions are disabled in this preview environment.
                    </p>
                </div>
                <hr class="website-divider">
                <div>
                    <span class="website-micro website-text-muted">--type-small (14px, Inter 400) &amp; --type-caption (13px)</span>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-1);">
                        Secondary copy: High-altitude mountain terrain requires verified equipment and seasonal route clearances.
                    </p>
                    <p class="website-caption website-text-muted" style="margin: 0;">
                        Caption metadata: Sample calendar fixed to September 2030. No actual flight reservations created.
                    </p>
                </div>
                <hr class="website-divider">
                <div>
                    <span class="website-micro website-text-muted">Long title line wrapping test</span>
                    <h3 class="website-h2" style="max-width: 600px;">
                        Upper Mustang Forbidden Kingdom &amp; Lo Manthang Cultural Trek: Slower Exploration of Ancient Caves &amp; Tibetan Heritage
                    </h3>
                </div>
            </div>
        </section>

        <!-- 2. Color Palette & Contrast -->
        <section class="website-card" style="margin-bottom: var(--space-8);">
            <div class="website-badge website-badge--warm" style="margin-bottom: var(--space-3);">02. Color Tokens</div>
            <h2 class="website-h4" style="margin-bottom: var(--space-4);">Color Palette &amp; Contrast Assurance</h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: var(--space-4);">
                <div style="background: var(--color-primary); color: #fff; padding: var(--space-4); border-radius: var(--radius-md);">
                    <strong style="display: block;">Primary</strong>
                    <span class="website-micro">#183B32</span>
                </div>
                <div style="background: var(--color-secondary); color: #fff; padding: var(--space-4); border-radius: var(--radius-md);">
                    <strong style="display: block;">Secondary</strong>
                    <span class="website-micro">#285447</span>
                </div>
                <div style="background: var(--color-accent-action); color: #fff; padding: var(--space-4); border-radius: var(--radius-md);">
                    <strong style="display: block;">Accent Action</strong>
                    <span class="website-micro">#A64B28</span>
                </div>
                <div style="background: var(--color-primary-soft); color: var(--color-primary); padding: var(--space-4); border-radius: var(--radius-md); border: 1px solid var(--color-border);">
                    <strong style="display: block;">Primary Soft</strong>
                    <span class="website-micro">#E7EFEB</span>
                </div>
                <div style="background: var(--color-background-warm); color: var(--color-text); padding: var(--space-4); border-radius: var(--radius-md); border: 1px solid var(--color-border);">
                    <strong style="display: block;">Warm Canvas</strong>
                    <span class="website-micro">#F5F2EA</span>
                </div>
                <div style="background: var(--color-surface); color: var(--color-text); padding: var(--space-4); border-radius: var(--radius-md); border: 1px solid var(--color-border);">
                    <strong style="display: block;">Surface</strong>
                    <span class="website-micro">#FFFFFF</span>
                </div>
            </div>
        </section>

        <!-- 3. Interactive Buttons & States -->
        <section class="website-card" style="margin-bottom: var(--space-8);">
            <div class="website-badge website-badge--warm" style="margin-bottom: var(--space-3);">03. Buttons &amp; States</div>
            <h2 class="website-h4" style="margin-bottom: var(--space-4);">Button Primitives (Zero Shadow, Outlined Focus)</h2>

            <div style="display: flex; flex-wrap: wrap; gap: var(--space-3); align-items: center; margin-bottom: var(--space-4);">
                <button type="button" class="website-btn website-btn--primary">Primary Action</button>
                <button type="button" class="website-btn website-btn--accent">Accent Action</button>
                <button type="button" class="website-btn website-btn--outline">Outline Action</button>
                <button type="button" class="website-btn website-btn--ghost">Ghost Action</button>
                <button type="button" class="website-btn website-btn--text">Text Link Action</button>
                <button type="button" class="website-btn website-btn--primary website-btn--prominent">Prominent (52px)</button>
                <button type="button" class="website-btn website-btn--primary website-btn--compact">Compact (40px)</button>
            </div>

            <hr class="website-divider">

            <div style="display: flex; flex-wrap: wrap; gap: var(--space-3); align-items: center;">
                <button type="button" class="website-btn website-btn--primary" disabled>Disabled State</button>
                <button type="button" class="website-btn website-btn--primary is-busy" aria-busy="true">Busy State...</button>
                <button type="button" class="website-btn website-btn--outline" style="max-width: 220px; white-space: normal; text-align: center;">
                    Multiple-Line Wrapped Button Test
                </button>
            </div>
        </section>

        <!-- 4. Form Controls & Validation -->
        <section class="website-card" style="margin-bottom: var(--space-8);">
            <div class="website-badge website-badge--warm" style="margin-bottom: var(--space-3);">04. Form Controls</div>
            <h2 class="website-h4" style="margin-bottom: var(--space-4);">Accessible Inputs &amp; Verification</h2>

            <div class="website-grid-2">
                <div class="website-form-group">
                    <label for="sample-input" class="website-label">Standard Input Field</label>
                    <input type="text" id="sample-input" class="website-input" placeholder="e.g. Everest Base Camp" value="Langtang Valley">
                    <span class="website-field-hint">Helper hint describing expected input format.</span>
                </div>

                <div class="website-form-group">
                    <label for="sample-invalid" class="website-label">Invalid Validation State</label>
                    <input type="text" id="sample-invalid" class="website-input is-invalid" value="Invalid sample input">
                    <span class="website-field-error">Please select an available departure date from the website list.</span>
                </div>

                <div class="website-form-group">
                    <label for="sample-select" class="website-label">Trek Region Select</label>
                    <select id="sample-select" class="website-select">
                        <option value="everest">Everest Region</option>
                        <option value="annapurna">Annapurna Region</option>
                        <option value="manaslu">Manaslu Region</option>
                    </select>
                </div>

                <div class="website-form-group">
                    <label for="sample-disabled" class="website-label">Disabled Control</label>
                    <input type="text" id="sample-disabled" class="website-input" value="Locked website value" disabled>
                </div>
            </div>

            <div class="website-form-group" style="margin-top: var(--space-4);">
                <label for="sample-textarea" class="website-label">Special Requests (Non-sensitive website text)</label>
                <textarea id="sample-textarea" class="website-textarea" placeholder="Note diet or pace preferences (maximum 1,000 characters)..."></textarea>
            </div>

            <div style="display: flex; gap: var(--space-6); flex-wrap: wrap; margin-top: var(--space-4);">
                <label class="website-checkbox-label">
                    <input type="checkbox" checked>
                    <span>Sample checkbox option (Flexible dates)</span>
                </label>
                <label class="website-radio-label">
                    <input type="radio" name="website-radio" checked>
                    <span>Standard tea house lodging</span>
                </label>
                <label class="website-radio-label">
                    <input type="radio" name="website-radio">
                    <span>Upgraded lodge preference</span>
                </label>
            </div>
        </section>

        <!-- 5. Cards & Minimal-Shadow Primitives -->
        <section class="website-card" style="margin-bottom: var(--space-8);">
            <div class="website-badge website-badge--warm" style="margin-bottom: var(--space-3);">05. Cards &amp; No-Shadow Boundary</div>
            <h2 class="website-h4" style="margin-bottom: var(--space-4);">Structural Surfaces with Zero Box-Shadow</h2>

            <div class="website-grid-3">
                <div class="website-card">
                    <span class="website-badge website-badge--primary">Static Surface</span>
                    <h3 class="website-card-title" style="margin-top: var(--space-2);">Standard Website Card</h3>
                    <p class="website-small website-text-secondary" style="margin-top: var(--space-2);">
                        Uses 1px solid border and clean padding. Absolutely zero box-shadow or elevation blur.
                    </p>
                </div>

                <a href="#interactive-test" class="website-card website-card--interactive">
                    <span class="website-badge website-badge--accent">Interactive Card</span>
                    <h3 class="website-card-title" style="margin-top: var(--space-2);">Hover / Focus Card</h3>
                    <p class="website-small website-text-secondary" style="margin-top: var(--space-2);">
                        Border shifts to primary green on hover/focus. Focus uses 2px solid outline. No shadow.
                    </p>
                </a>

                <div class="website-card website-card--warm">
                    <span class="website-badge website-badge--warm">Warm Surface</span>
                    <h3 class="website-card-title" style="margin-top: var(--space-2);">Editorial Accent Card</h3>
                    <p class="website-small website-text-secondary" style="margin-top: var(--space-2);">
                        Uses warm cream background (#f5f2ea) to delineate context without drop-shadows.
                    </p>
                </div>
            </div>

            <div style="margin-top: var(--space-6); padding: var(--space-6); background: var(--color-surface); border-radius: var(--radius-lg);" class="website-overlay">
                <span class="website-badge website-badge--outline">Documented Exception</span>
                <h3 class="website-card-title" style="margin-top: var(--space-2);">Overlay Token (Dropdown / Modal / Drawer Only)</h3>
                <p class="website-small website-text-secondary" style="margin-top: var(--space-2); margin-bottom: 0;">
                    Uses the single authorized overlay shadow token: <code>0 8px 24px rgba(29, 36, 33, 0.10)</code>. Permitted exclusively for functional overlay panels to separate from background content.
                </p>
            </div>
        </section>
    </main>
</body>
</html>
