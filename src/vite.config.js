import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        hmr: {
            host: 'localhost',
            overlay: false,
        },
        watch: {
            usePolling: true,
            interval: 5000,
            binaryInterval: 10000,
            ignored: [
                '**/storage/framework/views/**',
                '**/node_modules/**',
                '**/dist/**',
                '**/.git/**',
                '**/vendor/**',
            ],
        },
    },
});
