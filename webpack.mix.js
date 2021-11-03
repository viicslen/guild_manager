const mix = require('laravel-mix');

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

mix.react('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css');

mix.copy('node_modules/mdbootstrap/js', 'public/js');
mix.copy('node_modules/mdbootstrap/img', 'public/img');
mix.copy('node_modules/mdbootstrap/font', 'public/font');
mix.copy('node_modules/mdbootstrap/mdb-addons', 'public/mdb-addons');
mix.copy('node_modules/mdbootstrap/templates', 'public/templates');

mix.browserSync('localhost');
