const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'js')
   .vue({ version: 2 })
   .setPublicPath('public');
   
if (mix.inProduction()) {
    mix.version();
} 
