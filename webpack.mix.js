const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js([
        'resources/js/helper/download.js',
        'resources/js/helper/predefine-localstorage.js',
        'resources/js/helper/State.js',
        'resources/js/helper/triggerEnterButton.js',
        'resources/js/helper/vkbeautify.0.99.00.beta.js',
    ], 'public/js/app/helper.js')
    .babel([
        'resources/js/localization.js',
        'resources/js/general.js',
        'resources/js/local-storage.js',
        'resources/js/cta-function.js'
    ], 'public/js/app/general.js')
    .babel('resources/js/json/currencies.json', 'public/js/app/json/currencies.json')
    .babel('resources/js/json/province-id.json', 'public/js/app/json/province-id.json')
    .babel('resources/js/json/regions.json', 'public/js/app/json/regions.json')
    .babel('resources/js/json/robots.json', 'public/js/app/json/robots.json')
    .babel('resources/js/tools/word-counter.js', 'public/js/app/tools/word-counter.js')
    .babel('resources/js/tools/metachecker.js', 'public/js/app/tools/metachecker.js')
    .babel('resources/js/tools/breadcrumb-json.js', 'public/js/app/tools/breadcrumb-json.js')
    .babel('resources/js/tools/faq-json-ld.js', 'public/js/app/tools/faq-json-ld.js')
    .babel('resources/js/tools/howto-json.js', 'public/js/app/tools/howto-json.js')
    .babel('resources/js/tools/jobPosting-json.js', 'public/js/app/tools/jobPosting-json.js')
    .babel('resources/js/tools/person-json.js', 'public/js/app/tools/person-json.js')
    .babel('resources/js/tools/product-json.js', 'public/js/app/tools/product-json.js')
    .babel('resources/js/tools/recipe-json.js', 'public/js/app/tools/recipe-json.js')
    // .babel('resources/js/tools/article-json.js', 'public/js/app/tools/article-json.js')
    // .babel('resources/js/tools/event-json.js', 'public/js/app/tools/event-json.js')
    .babel('resources/js/tools/pagespeed.js', 'public/js/app/tools/pagespeed.js')
    .babel('resources/js/tools/sitemap.js', 'public/js/app/tools/sitemap.js')
    // .babel('resources/js/tools/mobiletest.js', 'public/js/app/tools/mobiletest.js')
    .babel('resources/js/tools/sslchecker.js', 'public/js/app/tools/sslchecker.js')
    .babel('resources/js/tools/robotgenerator.js', 'public/js/app/tools/robotgenerator.js')
    .babel('resources/js/tools/redirect-chain-checker.js', 'public/js/app/tools/redirect-chain-checker.js')
    .babel('resources/js/tools/technology-lookup.js', 'public/js/app/tools/technology-lookup.js')
    .babel('resources/js/tools/link-analyzer.js', 'public/js/app/tools/link-analyzer.js')
    .babel('resources/js/tools/hreflang-checker.js', 'public/js/app/tools/hreflang-checker.js')
    .babel('resources/js/tools/keyword-permutation.js', 'public/js/app/tools/keyword-permutation.js')
    .sass('resources/sass/app.scss', 'public/css');
