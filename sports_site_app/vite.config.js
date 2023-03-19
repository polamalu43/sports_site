import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    server: {
        host: true,
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/ts/app.ts',
                'resources/css/app.css',
                'resources/sass/app.scss',
            ],
            refresh: true,
        }),
        react(),
    ],
});
