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
                'resources/js/pages/group/dashboard.js',
                'resources/js/pages/group/map.js',
                'resources/js/pages/create-post.js',
                'resources/js/pages/group/create.js',
                'resources/js/components/image-slider.js',
                'resources/js/pages/group/createTransaction.js',
                'resources/js/components/mapbox/edit-map.js',
                'resources/js/pages/edit-post.js',
            ],
            refresh: true,
        }),
    ],
});
