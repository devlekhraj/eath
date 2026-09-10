
// vite.config.js
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig({
    plugins: [
        laravel({
            //   input: ['resources/js/app.js'],
            input: [
                'packages/admin/resources/admin/main.ts',
                'packages/admin/resources/admin/admin.scss',

                'packages/website/resources/website/scss/tiptap-viewer.scss',
                'packages/website/resources/website/scss/website.scss',
                'packages/website/resources/website/js/website.js',
                'packages/website/resources/website/scss/website-preview.scss',
                'packages/website/resources/website/scss/website-preview-icons.scss',
                'packages/website/resources/website/js/website-preview.js'
            ],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'packages/admin/resources/admin'),
            '@pages': path.resolve(__dirname, 'packages/admin/resources/admin/pages'),
            '@components': path.resolve(__dirname, 'packages/admin/resources/admin/components'),
            '@utils': path.resolve(__dirname, 'packages/admin/resources/admin/utils'),
        }
    },
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler',
                silenceDeprecations: ['color-functions', 'import', 'global-builtin', 'mixed-decls'],
            },
        },
    },
    optimizeDeps: {
        include: ['jquery', 'summernote/dist/summernote-lite.js'],
    },
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    'vendor-vue': ['vue', 'vue-router', 'pinia'],
                    'vendor-vuetify': ['vuetify'],
                    'vendor-swiper': ['swiper'],
                    'vendor-bootstrap': ['bootstrap'],
                }
            }
        }
    }
})
