import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

const path = require('path')

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        root: path.resolve(__dirname, 'src'),
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~@fortawesome': path.resolve(__dirname, 'node_modules/@fortawesome'),
        }
    }
});
