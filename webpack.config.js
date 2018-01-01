const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('global', './assets/js/global.js')
    .addEntry('restaurant_index', './assets/js/restaurant_index.js')
    .addEntry('restaurant_details', './assets/js/restaurant_details.js')
    .addEntry('register', './assets/js/register.js')
    .addEntry('user_profile', './assets/js/user_profile.js')
    .createSharedEntry('vendor', [
        'jquery',
        'bootstrap',
        'bootstrap-sass/assets/stylesheets/_bootstrap.scss',
        'bootstrap-fileinput/css/fileinput.min.css',
        'bootstrap-fileinput',
        'bootstrap-fileinput/js/locales/pl.js',
        'alertifyjs/build/alertify.min.js',
        'alertifyjs/build/css/alertify.min.css',
        'alertifyjs/build/css/themes/bootstrap.min.css',
    ])
    .enableVersioning()
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: false
    })
    .autoProvidejQuery()
    .enableSourceMaps(!Encore.isProduction())
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications();

module.exports = Encore.getWebpackConfig();