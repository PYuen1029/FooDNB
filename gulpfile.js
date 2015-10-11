var elixir = require('laravel-elixir');
var paths = {
    'jquery': './bower_components/jquery/',
    'bootstrap': './bower_components/bootstrap-sass/assets/'
};

var paths = {
    'bower_base_path': './bower_components/',
    'bootstrap': './bower_components/bootstrap-sass/assets/'
};


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

elixir(function (mix) {
    mix.sass('app.scss')
    .copy(paths.bootstrap + 'stylesheets/', 'resources/assets/sass')
    .copy(paths.bootstrap + 'fonts/bootstrap', 'public/fonts')
    .copy(paths.bootstrap + 'javascripts/bootstrap.js', 'public/js/vendor/bootstrap.js')
    .copy(paths.bower_base_path + 'jquery/dist/jquery.min.js', 'public/js/vendor/jquery.js')
    .copy(paths.bower_base_path + 'font-awesome/css/font-awesome.min.css', 'public/css/vendor/font-awesome.css');
});
