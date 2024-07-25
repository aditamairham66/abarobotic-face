import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import { glob } from "glob";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                ...glob.sync("resources/js/**/*.js", {
                    ignore: ["resources/js/bootstrap.js"],
                }),
                ...glob.sync("resources/css/**/*.css", {
                    ignore: [],
                }),
            ],
            refresh: true,
        }),
    ],
});

