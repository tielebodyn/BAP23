import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // load every js file individually
                'resources/js/pages/edit-profile.js',
                'resources/js/components/sidebar.js',
            ],
            refresh: true,
        }),
    ],
});
