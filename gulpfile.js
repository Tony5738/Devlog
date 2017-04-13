var gulp = require('gulp');
var bower = require('gulp-bower');
var elixir = require('laravel-elixir');

gulp.task('bower', function(){
    return bower();
});

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

var paths={
    'bootstrap':'vendor/bootstrap/dist',
    'jquery':'vendor/jquery/dist',
    'jquery_ui':'vendor/jquery-ui',
    'font_awesome':'vendor/font-awesome'
};

elixir.config.sourcemaps = false;

elixir(function(mix){
    //Run bower install
    mix.task('bower');

    //Copy fonts straight to public
    mix.copy('resources/assets/' + paths.bootstrap + '/fonts/**', 'public/fonts');
    mix.copy('resources/assets/' + paths.font_awesome + '/fonts/**','public/fonts');

    //Copy images straight to public
    mix.copy('resources/assets' + paths.jquery_ui + '/themes/base/images/**', 'public/css/images');


    //Merge app styles
    mix.styles([
        '../../assets/' + paths.bootstrap + '/css/bootstrap.css',
        '../../assets/' + paths.bootstrap + '/css/bootstrap-theme.css',
        '../../assets/' + paths.jquery_ui + '/themes/base/jquery-ui.css',
        '../../assets/' + paths.font_awesome + '/css/font-awesome.css',
        'blog.css',
        'site.css'
    ], 'public/css/app.css');

    //Merge app scripts
    mix.scripts([
        '../../assets/' + paths.jquery + '/jquery.js',
        '../../assets/' + paths.jquery_ui + '/jquery-ui.js',
        '../../assets/' + paths.bootstrap + '/js/bootstrap.js',
    ], 'public/js/app.js');

});
