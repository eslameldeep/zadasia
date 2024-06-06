import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/frontend/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~node_modules': path.resolve(__dirname, 'node_modules'),
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost'
        },
    }, 
});