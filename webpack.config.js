var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('global', './assets/js/global.js')
    .addEntry('restaurant_index', './assets/js/restaurant_index.js')
    .addEntry('restaurant_details', './assets/js/restaurant_details.js')
    .createSharedEntry('vendor', [
        'jquery',
        'bootstrap',
        'bootstrap-sass/assets/stylesheets/_bootstrap.scss'
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