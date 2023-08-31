import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/store.js',
                'resources/sass/store.scss',
            ],
            refresh: true,
        }),
    ],
});
