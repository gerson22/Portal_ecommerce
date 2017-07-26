var elixir = require('laravel-elixir');

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

    mix.copy(
        'node_modules/sweetalert2/dist/sweetalert2.min.js',
        'resources/assets/js/libs'
    ).copy(
        'node_modules/jquery-inputmask/index.js',
        'resources/assets/js/libs'
    ).copy(
        'node_modules/sweetalert2/dist/sweetalert2.min.css',
        'resources/assets/css/libs'
    );

    mix.styles([
            'libs/sweetalert2.min.css'
        ],  'public/assets/css/libs.css')
        .scripts([
            'libs/sweetalert2.min.js'
        ],  'public/assets/js/libs.js')
        .scripts([
            'libs/index.js'
        ],  'public/assets/js/inputMask.js');

});
