var elixir = require('laravel-elixir');
var elixirTypscript = require('elixir-typescript');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
});

elixir(function(mix) {
  mix.typescript('app-module.ts', 'public/js/app-module.js');  
  mix.typescript('view-helper.ts', 'public/js/view-helper.js');  
  mix.typescript('app-service.ts', 'public/js/app-service.js');
  mix.typescript('app.ts', 'public/js/app.js');  
  mix.typescript('greeter.ts', 'public/js/greeter.js');
});
