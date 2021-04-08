<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Cookie;

Route::get('/login', 'Auth\LoginController@loginView');
Route::post('/validate','Auth\LoginController@validateLogin');
Route::get('/logout','Auth\LoginController@logout');
Route::middleware([\App\Http\Middleware\ManualAuth::class])->group(function (){
    Route::redirect('/', '/en');
//Route::resource('/', 'HomeController');
    Route::get('/analytics', function (){
        return view('premiumtools');
    });
    Route::get('/construction', function (){
        return redirect('/analytics');
    });
    Route::get('/url', 'ToolsController@loadssl');
    Route::get('/{lang}','HomeController@index');
    Route::get('blog/data', 'HomeController@getBlogData');

//Route::get('/test', function (){
//    return view('/tools/strikethrough');
//});

    Route::get('/{lang}/strikethrough', 'ToolsController@strikethrough');
    Route::get('/{lang}/json-ld-schema-generator', 'ToolsController@jsonld');
    Route::get('/{lang}/json-ld-faq-schema-generator', 'ToolsController@FAQ');
    Route::get('/{lang}/json-ld-breadcrumb-schema-generator', 'ToolsController@breadcrumb');
    Route::get('/{lang}/json-ld-how-to-schema-generator', 'ToolsController@howto');
    Route::get('/{lang}/json-ld-job-posting-schema-generator', 'ToolsController@jobposting');
    Route::get('/{lang}/json-ld-person-schema-generator', 'ToolsController@person');
    Route::get('/{lang}/json-ld-product-schema-generator', 'ToolsController@product');
    Route::get('/{lang}/json-ld-recipe-schema-generator', 'ToolsController@recipe');
    Route::get('/{lang}/word-counter', 'ToolsController@wordcounter');
    Route::get('/{lang}/page-title-meta-description-checker', 'ToolsController@metachecker');
    Route::get('/{lang}/dummy-credit-card-generator', 'ToolsController@creditcard');
    Route::get('/{lang}/symbol-and-text-generator', 'ToolsController@symbolandtext');
    Route::get('/{lang}/pagespeed-test', 'ToolsController@pagespeed');
    Route::get('/{lang}/sitemap-generator', 'ToolsController@sitemap');
    Route::get('/{lang}/mobile-friendly-test', 'ToolsController@mobiletest');
    Route::get('/{lang}/ssl-checker', 'ToolsController@sslchecker');
    Route::get('/{lang}/robotstxt-generator', 'ToolsController@robotgenerator');
    Route::get('/{lang}/technology-lookup', 'ToolsController@technologylookup');
    Route::get('/{lang}/redirect-checker', 'ToolsController@redirectchecker');
    Route::get('/{lang}/hreflang-checker', 'ToolsController@hreflangchecker');
    Route::get('/{lang}/link-analyzer', 'ToolsController@linkanalyzer');
    Route::get('/{lang}/keyword-research', 'ToolsController@keywordresearch');
    Route::get('/{lang}/keyword-permutation', 'ToolsController@keywordpermutation');
    Route::get('/en/version', 'ToolsController@englishVersion');
    Route::get('/id/version', 'ToolsController@indonesiaVersion');
});
