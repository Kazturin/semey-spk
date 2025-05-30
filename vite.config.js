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
        // Проксируем запросы к /fonts на корень Laravel
        proxy: {
            '^/fonts/.*': {
                target: 'http://localhost', // Сервер Laravel
                changeOrigin: true,
                secure: false,
            },
        },
    },
});
