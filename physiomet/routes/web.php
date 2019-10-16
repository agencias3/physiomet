<?php

include('admin.php');
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

//LANDING PAGE / CAMPANHA
Route::group(['prefix' => 'campanha', 'as' => 'landing-page.', 'namespace' => 'LandingPage'], function () {
    Route::get('/', 'LandingPageController@index')->name('index');
    Route::get('/{seo_link}', 'LandingPageController@show')->name('show');
    Route::post('/store', 'LandingPageContactController@store')->name('store');
});

Route::group(['namespace' => 'Site'], function () {
    Route::get('/sitemap.xml', 'SiteMapController@index')->name('sitemap');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/a-clinica', 'AboutController@index')->name('about');

    Route::get('/servicos', 'ServiceController@index')->name('service');
    Route::get('/servicos/{seo_link}', 'ServiceController@show')->name('service.show');

    Route::get('/tipos-fisio', 'TypeController@index')->name('type');
    Route::get('/tipos-fisio/{seo_link}', 'TypeController@show')->name('type.show');

    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog/tag/{tag}', 'BlogController@tag')->name('blog.tag');
    Route::get('/blog/{seo_link}', 'BlogController@show')->name('blog.show');

    Route::get('/contato', 'ContactController@index')->name('contact');
    Route::post('/contato/store', 'ContactController@store')->name('contact.store');
    Route::post('/newsletter/store', 'NewsletterController@store')->name('newsletter.store');

});
