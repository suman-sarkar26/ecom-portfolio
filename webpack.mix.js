const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/src/main.js', 'public/js/src').vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

