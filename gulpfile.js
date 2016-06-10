var elixir = require('laravel-elixir');
 
 
elixir(function(mix) {


    mix.sass(['app.scss'], 'resources/assets/css/');


    //merge css
    mix.styles([
    		 'animate.css/animate.css', 
    		 'hover/hover.min.css',
             'sweetalert/sweetalert.css',
             'bootstrap-datetimepicker/bootstrap-datetimepicker.min.css',
             'sidebar.css',
    		 'app.css',
             'sticky-footer.css',
             'custom.css',
    	]);


    //merge script js
 	mix.scripts(['jquery/jquery.min.js', 
 				 'pace/pace.min.js',
 				 'moment/moment.min.js',
 				 'moment/locales.js',
 				 'bootstrap/bootstrap.min.js',
 				 'wow/dist/wow.min.js',
                 'bootstrap-datetimepicker/bootstrap-datetimepicker.min.js',
 				 'sweetalert.min.js',
                 'custom.js'
 				 ], 
 				 'public/js/app.js');

 	//copy font ke build
 	mix.copy('node_modules/bootstrap-sass/assets/fonts', 'public/build/css/fonts');
 	mix.copy('node_modules/font-awesome/fonts', 'public/build/fonts');

     // mix.browserify('vue-main.js');
     
 	//version
    mix.version(['css/all.css', 'js/app.js']);


});
