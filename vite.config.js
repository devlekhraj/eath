
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
                'resources/admin/main.js',
                'resources/admin/admin.scss',

                'resources/website/scss/website.scss',
                'resources/website/js/website.js'
            ],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/admin'),
            '@pages': path.resolve(__dirname, 'resources/admin/pages'),
            '@components': path.resolve(__dirname, 'resources/admin/components'),
            '@utils': path.resolve(__dirname, 'resources/admin/utils'),
        }
    }
})
