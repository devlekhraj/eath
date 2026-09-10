<?php

namespace Website\Support;

class WebsiteAssetRegistry
{
    /**
     * Map of known authorized local assets.
     */
    protected static array $knownAssets = [
        'logo' => [
            'url' => '/images/logo.png',
            'alt' => 'EATH Ways Logo',
            'width' => 120,
            'height' => 40,
            'is_fallback' => false,
        ],
        'hero-home' => [
            'url' => '/images/hero.webp',
            'mobile_url' => '/images/hero-mobile.webp',
            'alt' => 'Himalayan mountain peaks under a clear sky',
            'width' => 1600,
            'height' => 900,
            'is_fallback' => false,
        ],
        'trek-t-ebc' => [
            'url' => '/cdn/destinations/everest/gallery/2026-02-02/everest-gallery-8106bd31e5-1280.webp',
            'mobile_url' => '/cdn/destinations/everest/gallery/2026-02-02/everest-gallery-8106bd31e5-800.webp',
            'srcset' => '/cdn/destinations/everest/gallery/2026-02-02/everest-gallery-8106bd31e5-400.webp 400w, /cdn/destinations/everest/gallery/2026-02-02/everest-gallery-8106bd31e5-800.webp 800w, /cdn/destinations/everest/gallery/2026-02-02/everest-gallery-8106bd31e5-1280.webp 1280w',
            'alt' => 'Everest Base Camp trail through the Khumbu region beneath Himalayan peaks',
            'width' => 1280,
            'height' => 853,
            'is_fallback' => false,
        ],
        // Everest gallery sample assets audited in public/cdn/destinations/everest/gallery/2026-02-02/
        'gallery-t-ebc-01' => [
            'url' => '/cdn/destinations/everest/gallery/2026-02-02/everest-gallery-8106bd31e5-1280.webp',
            'alt' => 'Everest Base Camp trail sample view',
            'width' => 1280,
            'height' => 853,
            'is_fallback' => false,
        ],
        'gallery-t-ebc-02' => [
            'url' => '/cdn/destinations/everest/gallery/2026-02-02/everest-gallery-bd33dc2eaf-1280.webp',
            'alt' => 'Everest mountain panorama sample',
            'width' => 1280,
            'height' => 853,
            'is_fallback' => false,
        ],
    ];

    /** Load the complete central manifest once, while preserving audited assets above. */
    protected static function manifest(): array
    {
        static $manifest;
        if ($manifest === null) {
            $manifest = require dirname(__DIR__, 2).'/resources/website/manifest/image-manifest.php';
            $manifest = array_merge($manifest, self::$knownAssets);
        }

        return $manifest;
    }

    /**
     * Resolve an image asset by its registry key.
     */
    public static function resolve(?string $key, string $defaultAlt = 'EATH Website Image', int $width = 800, int $height = 600): array
    {
        $assets = self::manifest();
        if ($key && isset($assets[$key])) {
            return $assets[$key];
        }

        // Return a deterministic, labeled, zero-network SVG fallback
        $label = $key ? "Sample image: {$key}" : 'Sample website image';

        return [
            'url' => self::generateSvgPlaceholder($label, $width, $height),
            'alt' => $defaultAlt . ' (Website sample image)',
            'width' => $width,
            'height' => $height,
            'is_fallback' => true,
        ];
    }

    /**
     * Generate an inline SVG data URI placeholder.
     */
    public static function generateSvgPlaceholder(string $label, int $width, int $height): string
    {
        $safeLabel = htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="'.$width.'" height="'.$height.'" viewBox="0 0 '.$width.' '.$height.'">'
            .'<rect width="100%" height="100%" fill="#f1f5f9"/>'
            .'<rect x="2" y="2" width="'.($width - 4).'" height="'.($height - 4).'" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-dasharray="6,6"/>'
            .'<path d="M'.($width / 2 - 24).' '.($height / 2 - 16).' l24 -28 l24 28 z M'.($width / 2 + 8).' '.($height / 2 - 8).' l16 -18 l16 18 z" fill="#94a3b8"/>'
            .'<text x="50%" y="'.($height / 2 + 28).'" dominant-baseline="middle" text-anchor="middle" font-family="system-ui, -apple-system, sans-serif" font-size="14" fill="#64748b">'
            .$safeLabel
            .'</text>'
            .'</svg>';

        return 'data:image/svg+xml;utf8,' . rawurlencode($svg);
    }
}
