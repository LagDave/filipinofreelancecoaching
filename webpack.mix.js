const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/manage_courses.js", "public/js")
    .js("resources/js/manage_users.js", "public/js")
    .js("resources/js/manage_downloadables.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/statistics.scss", "public/css");
