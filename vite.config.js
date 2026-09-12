
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
            'v-phone-input/styles': path.resolve(__dirname, 'node_modules/v-phone-input/dist/v-phone-input.css'),
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
        chunkSizeWarningLimit: 1000,
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules/vuetify')) {
                        return 'vendor-vuetify';
                    }
                    if (id.includes('node_modules/vue/') || id.includes('node_modules/@vue/') || id.includes('node_modules/vue-router') || id.includes('node_modules/pinia')) {
                        return 'vendor-vue';
                    }
                    if (id.includes('node_modules/swiper')) {
                        return 'vendor-swiper';
                    }
                    if (id.includes('node_modules/bootstrap')) {
                        return 'vendor-bootstrap';
                    }
                }
            }
        }
    }
})
