const Encore = require('@symfony/webpack-encore');
// https://symfonycasts.com/screencast/webpack-encore

Encore

    .setOutputPath('htdocs/www/dist')
    .setPublicPath('/dist')
    .setManifestKeyPrefix('')
    .addEntry('app', './assets/application.js')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableSassLoader()
    .enablePostCssLoader()
    .configureBabel(()=> {}, {
        useBuiltIns: 'usage',
        corejs: 3
    })

    //tohle jsou všechno super optimalizace které by ale vyžadovali integraci na straně Latte - proto vypnuto
    .disableSingleRuntimeChunk()
    // .splitEntryChunks()
    // .enableVersioning(Encore.isProduction())
;

module.exports = Encore.getWebpackConfig();
