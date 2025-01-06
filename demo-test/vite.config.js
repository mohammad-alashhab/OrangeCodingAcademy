import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/style.css",
                "public/assets/css/style.css",
                "public/assets/css/vendor/bootstrap.min.css",
                "public/assets/css/plugins/swiper-bundle.min.css",
                "public/assets/css/plugins/glightbox.min.css",
                "resources/css/datatables.css",
                "resources/js/app.js",
                "public/assets/js/script.js",
                "public/assets/js/vendor/bootstrap.min.js",
                "public/assets/js/vendor/popper.js",
                "public/assets/js/plugins/swiper-bundle.min.js",
                "public/assets/js/plugins/glightbox.min.js",
            ],
            refresh: true,
        }),
    ],
});
