import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import fs from "fs";
import path from "path";

// Recursively scan directories for .css files
function loadCssFiles(dir = "resources/css") {
    const directoryPath = path.resolve(__dirname, dir);
    let cssFiles = [];

    const items = fs.readdirSync(directoryPath);

    for (const item of items) {
        const fullPath = path.join(directoryPath, item);
        const relativePath = path.join(dir, item);

        if (fs.statSync(fullPath).isDirectory()) {
            // Recursively scan subfolders
            cssFiles = cssFiles.concat(loadCssFiles(relativePath));
        } else if (item.endsWith(".css")) {
            cssFiles.push(relativePath);
        }
    }

    return cssFiles;
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                ...loadCssFiles(), // All CSS files recursively
                "resources/js/app.js", // Your JS entry file
            ],
            refresh: true,
        }),
    ],
});
