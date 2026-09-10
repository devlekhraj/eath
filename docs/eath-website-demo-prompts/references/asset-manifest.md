# Asset and copy contract

## 1. Asset registry

Create one logical image registry that maps keys to actual audited local paths. A key is not a guessed filename. Components receive URLs/alt/width/height/focal point from this registry, not string-concatenated remote URLs.

| Key pattern | Use | Ratio |
| --- | --- | --- |
| hero-home | Homepage landscape | wide; responsive crop |
| trek-{id} | Trek card and detail hero | 4:3 / wide reuse with focal metadata |
| region-{slug} | Destination tile/detail | 4:5 / 16:10 |
| experience-{slug} | Experience tile/detail | 4:3 / 16:10 |
| editorial-planner, editorial-safety, editorial-custom | Split sections | 16:10 |
| guide-demo-01..03 | Fictional profiles | 1:1 or consistent 4:5 |
| story-demo-01..03 | Sample stories | 16:10 |
| article-{id} | Article cards/header | 16:10 |
| gallery-{trek-id}-01..04 | Detail gallery | mixed source, stable thumbnails |
| logo | Existing authorized EATH logo | intrinsic ratio |

Use existing authorized website assets first. Do not attach a real person's portrait to a fictional testimonial, qualification or guide identity. Use labeled silhouette/illustrated placeholders for fictional people. A neutral local SVG placeholder is acceptable when no suitable authorized image exists; do not draw a fake geographic map or imply it depicts the named trek.

## 2. Missing asset behavior

Provide a local reusable fallback with explicit dimensions and a visible development label such as `Sample trek image`. Log intended slot and required authentic image. Final demo may contain labeled image placeholders; it may not contain broken images, loading skeletons forever, empty page sections or unlicensed hotlinks. No network-fetched random image service.

Image failure must show the fallback once without an infinite onerror loop. Do not present stock imagery as a photograph of a specific trek unless known. Decorative images use empty alt; content images describe what is actually visible.

## 3. Copy rules

- English. Concise, useful, calm. Do not use lorem ipsum or repeat one paragraph on all pages.
- Page fixtures hold titles, intros, sections and CTA context. Views only format them.
- Real place names identify sample products, not verification of routes or conditions.
- Every fictional person/story and every illustrative pricing/date/itinerary group has a visible nearby disclosure.
- Brand copy is a proposed design voice, not a statement of certifications or achievements.
- Policy and safety samples are not legal/medical guidance; leave operational specifics as `To be verified before launch`.

## 4. Media delivery

Use width/height or aspect-ratio. Use real generated image variants only when available. Never invent srcset files. Hero is not lazy-loaded; only the actual likely LCP image gets priority. Below-fold images load lazily. Restrict font weights to used 400/500/600; use already-licensed local files when present and system fallbacks otherwise. Do not block the build on external font downloads.

