const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('global', './assets/js/global.js')
    .addStyleEntry('css/all_restaurants', './assets/css/all_restaurants.scss')
    .addEntry('restaurant', './assets/js/restaurant.js')
    .addEntry('ranking', './assets/js/ranking.js')
    .addEntry('propose_restaurant', './assets/js/propose_restaurant.js')
    .addEntry('register', './assets/js/register.js')
    .addEntry('user_profile', './assets/js/user_profile.js')
    .createSharedEntry('vendor', [
        'jquery',
        'bootstrap',
        'bootstrap-fileinput/css/fileinput.min.css',
        'bootstrap-fileinput',
        'bootstrap-fileinput/js/locales/pl.js',
        'bootstrap-star-rating/css/star-rating.min.css',
        'bootstrap-star-rating/js/star-rating.min.js',
        'alertifyjs/build/css/alertify.min.css',
        'alertifyjs/build/css/themes/bootstrap.min.css',
        'alertifyjs/build/alertify.min.js',
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