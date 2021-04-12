const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass("resources/sass/app.scss", "public/css/")
    .sass("resources/sass/login.scss", "public/css/login.css/")
    .sass("resources/sass/search-field.scss", "public/css/search-field.css/")
    .sass("resources/sass/recipe.scss", "public/css/recipe.css/");
