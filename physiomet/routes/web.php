<?php

use AgenciaS3\Entities\Form;
use AgenciaS3\Mail\Site\Contact\PartnerClientMail;
use AgenciaS3\Mail\Site\Contact\PartnerMail;
use Illuminate\Support\Facades\Mail;

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
    Route::get('/wesa', 'AboutController@index')->name('about');

    Route::get('/produtos', 'ProductController@index')->name('product');
    Route::get('/produtos/{seo_link}', 'ProductController@category')->name('product.category');
    Route::get('/produtos/{category}/{seo_link}', 'ProductController@show')->name('product.show');

    Route::get('/seguimentos', 'SegmentController@index')->name('segment');
    Route::get('/seguimentos/{seo_link}', 'SegmentController@show')->name('segment.show');

    Route::get('/empreendimentos', 'EnterpriseController@index')->name('enterprise');
    Route::get('/empreendimentos/{seo_link}', 'EnterpriseController@show')->name('enterprise.show');

    Route::get('/faq', 'FaqController@index')->name('faq');
    Route::get('/faq/like/{id}/{like}', 'FaqController@like')->name('like');

    Route::get('/segmentos-de-negocios', 'BusinessSegmentsController@index')->name('business-segments');
    Route::get('/segmentos-de-negocios/{seo_link}', 'BusinessSegmentsController@show')->name('business-segments.show');

    Route::get('/noticias', 'BlogController@index')->name('blog');
    Route::get('/noticias/tag/{tag}', 'BlogController@tag')->name('blog.tag');
    Route::get('/noticias/{seo_link}', 'BlogController@show')->name('blog.show');

    Route::get('/contato', 'ContactController@index')->name('contact');
    Route::post('/contato/store', 'ContactController@store')->name('contact.store');

    Route::get('/trabalhe-conosco', 'WorkController@index')->name('work');
    Route::post('/trabalhe-conosco/store', 'WorkController@store')->name('work.store');

    Route::get('/parceiros', 'PartnerController@index')->name('partner');
    Route::post('/parceiros/store', 'PartnerController@store')->name('partner.store');

    Route::post('/newsletter/store', 'NewsletterController@store')->name('newsletter.store');

    Route::group(['namespace' => 'Ajax', 'prefix' => 'ajax', 'as' => 'ajax.'], function () {
        Route::get('/getAddress/{zip_code}', 'AddressController@getAddress')->name('address.getAddress');
    });

    /*
    Route::get('/test-email', function(){
        $dados = \AgenciaS3\Entities\TechnicalAssistance::find(64);
        $form = Form::with('emails')->find(4);

        //email admin
        if ($form->emails) {
            $emails = [];
            foreach ($form->emails as $row) {
                $emails[] = $row->email;
            }
            Mail::to($emails)->send(new \AgenciaS3\Mail\Site\TechnicalAssistance\TechnicalAssistanceMail($dados));
        }

        //email client
        return Mail::to($dados)->send(new \AgenciaS3\Mail\Site\TechnicalAssistance\TechnicalAssistanceClientMail($dados, $form));
    });
    */

});
