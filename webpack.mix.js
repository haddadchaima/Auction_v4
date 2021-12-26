const mix = require('laravel-mix');

// Backend JS/CSS

mix.js('resources/js/app.js', 'public/js')
     .vue();
mix.js('resources/js/language.js', 'public/js');

mix.minify('public/js/role_manager.js');
mix.minify('public/js/custom.js');
mix.minify('public/js/cvalidator.js');

mix.minify('public/css/custom.css', 'public/css');
mix.minify('public/css/menu.css', 'public/css');
