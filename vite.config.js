import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/pages/edit-profile.js',
                'resources/js/components/sidebar.js',
                'resources/js/components/upload-image.js',
                'resources/js/page/dashboard.js',
                'resources/js/map.js',
                'resources/js/pages/create-post.js',
                'resources/js/pages/post/index.js',
            ],
            refresh: true,
        }),
    ],
});
