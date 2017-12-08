// webpack.config.js
var Encore = require('@symfony/webpack-encore');

Encore
// the project directory where all compiled assets will be stored
    .setOutputPath('public/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    .addEntry('app', './assets/js/app.js')
    .addEntry('main', './assets/js/main.js')
    .addEntry('restaurant_index', './assets/css/restaurant_index.scss')
    .addEntry('image1', './assets/images/image1.jpg')
    .addEntry('image2', './assets/images/image2.jpg')
    .addEntry('image3', './assets/images/image3.jpg')
    .addEntry('image4', './assets/images/image4.jpg')

    .createSharedEntry('vendor', [
        'jquery',
        'bootstrap',
        'bootstrap-sass/assets/stylesheets/_bootstrap.scss'
    ])

    // allow sass/scss files to be processed
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: false
    })

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()

    .enableSourceMaps(!Encore.isProduction())

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()

// create hashed filenames (e.g. app.abc123.css)
// .enableVersioning()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();