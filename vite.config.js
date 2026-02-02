import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/contact.css",
                "resources/css/about.css",
                "resources/css/projets.css",
                "resources/css/education.css",
                "resources/js/app.js",
                "resources/js/about.js",
                "resources/js/projets.js",
                "resources/js/contact.js",
                "resources/js/education.js",
            ],
            refresh: true,
        }),
    ],
});
