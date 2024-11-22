const mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', 'resources/css')
     .styles([
         'node_modules/animate.css/animate.css',
         'node_modules/hover.css/css/hover-min.css',
         'node_modules/sweetalert/dist/sweetalert.css',
         'resources/css/sidebar.css',
         'resources/css/app.css',
         'resources/css/sticky-footer.css',
         'resources/css/custom.css'
    ], 'public/css/all.css')
    .js([
         'node_modules/jquery/dist/jquery.min.js',
     //     'node_modules/pace-progress/pace.js',
         'node_modules/moment/moment.js',
         'node_modules/moment/min/locales.js',
         'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
         'node_modules/wowjs/dist/wow.min.js',
         'node_modules/sweetalert/lib/sweetalert.js',
         'resources/js/custom.js'
    ], 'public/js/app.js')
    .copy('node_modules/bootstrap-sass/assets/fonts', 'public/build/css/fonts')
    .copy('node_modules/font-awesome/fonts', 'public/fonts')
    .version(['public/css/all.css', 'public/js/app.js']);