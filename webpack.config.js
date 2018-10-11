var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')

    /*
     * ENTRY CONFIG
     */
    .addStyleEntry('styles', './assets/scss/styles.scss')
    .addEntry('app', './assets/js/app.js')

    /*
     * FEATURE CONFIG
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enablePostCssLoader((options) => {
        options.config = {
            path: 'postcss.config.js'
        };
    })
    .enableSassLoader()
    .autoProvidejQuery()
    //.configureBabel(function(babelConfig) {
    //})
;

module.exports = Encore.getWebpackConfig();
