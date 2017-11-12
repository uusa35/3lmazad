const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .react('resources/assets/js/form-app.js', 'public/js')
    .js('./bower_components/blueimp-gallery/js/blueimp-gallery.min.js', 'public/js/gallery.js')
    .sass('resources/assets/sass/backend.scss', 'public/css')
    .sass('resources/assets/sass/frontend.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/custom.scss', 'public/css')
    .sass('resources/assets/sass/custom-arabic.scss', 'public/css')
    .sass('resources/assets/sass/custom-english.scss', 'public/css')
    .sass('resources/assets/sass/gallery.scss', 'public/css')
    .scripts([
            './../../metronic_v4.5.6/theme/assets/global/plugins/respond.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/excanvas.min.js',
            './node_modules/jquery/dist/jquery.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/jquery.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/select2/js/select2.full.min.js',
            './../../metronic_v4.5.6/theme/assets/pages/scripts/components-multi-select.min.js',
            './node_modules/datatables/media/js/jquery.dataTables.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/js.cookie.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/jquery.blockui.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/ckeditor/ckeditor.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/autosize/autosize.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js',
            './../../metronic_v4.5.6/theme/assets/global/scripts/app.min.js',
            './../../metronic_v4.5.6/theme/assets/pages/scripts/components-form-tools.min.js',
            './../../metronic_v4.5.6/theme/assets/layouts/layout/scripts/layout.min.js',
            './../../metronic_v4.5.6/theme/assets/layouts/layout/scripts/demo.min.js',
            './../../metronic_v4.5.6/theme/assets/layouts/global/scripts/quick-sidebar.min.js',
        ],
        'public/js/backend.js')
    .scripts('resources/assets/js/backend-custom.js', 'public/js/backend-custom.js')
    .scripts([
        './resources/assets/html/vendor/waves/waves.min.js',
        './resources/assets/html/vendor/slick/slick.min.js',
        './resources/assets/html/vendor/bootstrap-select/bootstrap-select.min.js',
        './resources/assets/html/vendor/parallax/jquery.parallax-1.1.3.js',
        './resources/assets/html/vendor/waypoints/jquery.waypoints.min.js',
        './resources/assets/html/vendor/waypoints/sticky.min.js',
        './resources/assets/html/vendor/doubletaptogo/doubletaptogo.js',
        './resources/assets/html/vendor/elevatezoom/jquery.elevatezoom.js',
        './resources/assets/html/vendor/imagesloaded/imagesloaded.pkgd.min.js',
        './resources/assets/html/vendor/countdown/jquery.plugin.min.js',
        './resources/assets/html/vendor/countdown/jquery.countdown.min.js',
        //form validation
        './resources/assets/html/vendor/form/jquery.form.js',
        './resources/assets/html/vendor/form/jquery.validate.min.js',
        //
        './resources/assets/html/js/custom.js',
        './resources/assets/html/vendor/rs-plugin/js/jquery.themepunch.tools.min.js',
    ], 'public/js/frontend.js')
    .js('resources/assets/js/frontend-custom.js', 'public/js');

if (mix.config.inProduction) {
    mix.version();
}

