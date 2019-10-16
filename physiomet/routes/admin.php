<?php

//Auth::routes();
Route::redirect('/admin', '/physiomet/admin/login');

// Authentication Routes...
Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Admin\Auth\LoginController@login');
Route::post('admin/logout', 'Admin\Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('admin/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('admin/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('admin/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/password/reset', 'Admin\Auth\ResetPasswordController@reset');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

    // HOME
    Route::get('/home', ['as' => 'home.index', 'uses' => 'HomeController@index']);

    //BANNERS
    Route::group(['prefix' => 'banner', 'as' => 'banner.', 'namespace' => 'Banner'], function () {
        //desktop
        Route::group(['prefix' => 'desktop', 'as' => 'desktop.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'BannerController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'BannerController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'BannerController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'BannerController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'BannerController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'BannerController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'BannerController@active']);
            Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'BannerController@destroyFile']);
        });

        //MOBILE
        Route::group(['prefix' => 'mobile', 'as' => 'mobile.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'BannerMobileController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'BannerMobileController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'BannerMobileController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'BannerMobileController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'BannerMobileController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'BannerMobileController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'BannerMobileController@active']);
            Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'BannerMobileController@destroyFile']);
        });
    });

    //COVENANTS
    Route::group(['prefix' => 'covenant', 'as' => 'covenant.', 'namespace' => 'Covenant'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'CovenantController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'CovenantController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'CovenantController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CovenantController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'CovenantController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'CovenantController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'CovenantController@active']);
        Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'CovenantController@destroyFile']);
    });

    //TEAM
    Route::group(['prefix' => 'team', 'as' => 'team.', 'namespace' => 'Team'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TeamController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'TeamController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'TeamController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TeamController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'TeamController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TeamController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'TeamController@active']);
        Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'TeamController@destroyFile']);
    });

    //TIPS
    Route::group(['prefix' => 'tip', 'as' => 'tip.', 'namespace' => 'Tip'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TipController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'TipController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'TipController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TipController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'TipController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TipController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'FaqController@active']);
        Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'FaqController@destroyFile']);

        Route::group(['prefix' => 'item', 'as' => 'item.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'TipItemController@index']);
            Route::get('create/{id}', ['as' => 'create', 'uses' => 'TipItemController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'TipItemController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TipItemController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'TipItemController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TipItemController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'TipItemController@active']);
        });
    });

    //SERVICES
    Route::group(['prefix' => 'service', 'as' => 'service.', 'namespace' => 'Service'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ServiceController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ServiceController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ServiceController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ServiceController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ServiceController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ServiceController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'ServiceController@active']);

        //GALERY
        Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'ServiceImageController@index']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ServiceImageController@destroy']);
            Route::post('upload/{id}', ['as' => 'upload', 'uses' => 'ServiceImageController@upload']);
            Route::post('updateLabel/{id}', ['as' => 'updateLabel', 'uses' => 'ServiceImageController@updateLabel']);
            Route::post('cover/{id}', ['as' => 'cover', 'uses' => 'ServiceImageController@cover']);
            Route::post('order/{id}', ['as' => 'order', 'uses' => 'ServiceImageController@order']);
            Route::post('store', ['as' => 'store', 'uses' => 'ServiceImageController@store']);
            Route::get('destroyGallery/{id}', ['as' => 'destroyGallery', 'uses' => 'ServiceImageController@destroyAll']);
        });
    });

    //TYPES
    Route::group(['prefix' => 'type', 'as' => 'type.', 'namespace' => 'Type'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TypeController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'TypeController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'TypeController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TypeController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'TypeController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TypeController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'TypeController@active']);
        Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'TypeController@destroyFile']);

        //GALERY
        Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'TypeImageController@index']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TypeImageController@destroy']);
            Route::post('upload/{id}', ['as' => 'upload', 'uses' => 'TypeImageController@upload']);
            Route::post('updateLabel/{id}', ['as' => 'updateLabel', 'uses' => 'TypeImageController@updateLabel']);
            Route::post('cover/{id}', ['as' => 'cover', 'uses' => 'TypeImageController@cover']);
            Route::post('order/{id}', ['as' => 'order', 'uses' => 'TypeImageController@order']);
            Route::post('store', ['as' => 'store', 'uses' => 'TypeImageController@store']);
            Route::get('destroyGallery/{id}', ['as' => 'destroyGallery', 'uses' => 'TypeImageController@destroyAll']);
        });
    });

    //BLOG
    Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'Blog'], function () {

        //TAGS
        Route::group(['prefix' => 'tag', 'as' => 'tag.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'TagController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'TagController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'TagController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TagController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'TagController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TagController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'TagController@active']);
        });

        //POSTS
        Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'PostController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'PostController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'PostController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'PostController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'PostController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PostController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'PostController@active']);

            //TAGS
            Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {
                Route::get('{id}', ['as' => 'index', 'uses' => 'PostTagController@index']);
                Route::post('store', ['as' => 'store', 'uses' => 'PostTagController@store']);
                Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PostTagController@destroy']);
            });

            //GALERY
            Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
                Route::get('{id}', ['as' => 'index', 'uses' => 'PostImageController@index']);
                Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PostImageController@destroy']);
                Route::post('upload/{id}', ['as' => 'upload', 'uses' => 'PostImageController@upload']);
                Route::post('updateLabel/{id}', ['as' => 'updateLabel', 'uses' => 'PostImageController@updateLabel']);
                Route::post('cover/{id}', ['as' => 'cover', 'uses' => 'PostImageController@cover']);
                Route::post('order/{id}', ['as' => 'order', 'uses' => 'PostImageController@order']);
                Route::post('store', ['as' => 'store', 'uses' => 'PostImageController@store']);
            });
        });
    });

    //NEWSLETTER
    Route::group(['prefix' => 'newsletter', 'as' => 'newsletter.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'NewsletterController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'NewsletterController@show']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'NewsletterController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'NewsletterController@destroy']);
        Route::get('export', ['as' => 'export', 'uses' => 'NewsletterController@export']);
        Route::get('destroyAllMessages', ['as' => 'destroyAllMessages', 'uses' => 'NewsletterController@destroyAllMessages']);
    });

    //CONTACT
    Route::group(['prefix' => 'contact', 'as' => 'contact.', 'namespace' => 'Contact'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ContactController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'ContactController@show']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ContactController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ContactController@destroy']);
        Route::get('destroyAllMessages', ['as' => 'destroyAllMessages', 'uses' => 'ContactController@destroyAllMessages']);
        Route::get('export', ['as' => 'export', 'uses' => 'ContactController@export']);
    });

    //CONFIGURATIONS
    Route::group(['prefix' => 'configuration', 'as' => 'configuration.', 'namespace' => 'Configuration'], function () {

        //PAGE
        Route::group(['prefix' => 'page', 'as' => 'page.', 'namespace' => 'Page'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'PageController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'PageController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'PageController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'PageController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'PageController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PageController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'PageController@active']);
            Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'PageController@destroyFile']);

            //GALERY
            Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
                Route::get('{id}', ['as' => 'index', 'uses' => 'PageImageController@index']);
                Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PageImageController@destroy']);
                Route::post('upload/{id}', ['as' => 'upload', 'uses' => 'PageImageController@upload']);
                Route::post('updateLabel/{id}', ['as' => 'updateLabel', 'uses' => 'PageImageController@updateLabel']);
                Route::post('cover/{id}', ['as' => 'cover', 'uses' => 'PageImageController@cover']);
                Route::post('order/{id}', ['as' => 'order', 'uses' => 'PageImageController@order']);
                Route::post('store', ['as' => 'store', 'uses' => 'PageImageController@store']);
                Route::get('destroyGallery/{id}', ['as' => 'destroyGallery', 'uses' => 'PageImageController@destroyAll']);
            });

            //ITEM
            Route::group(['prefix' => 'item', 'as' => 'item.'], function () {
                Route::get('/{id}', ['as' => 'index', 'uses' => 'PageItemController@index']);
                Route::get('create/{id}', ['as' => 'create', 'uses' => 'PageItemController@create']);
                Route::post('store', ['as' => 'store', 'uses' => 'PageItemController@store']);
                Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'PageItemController@edit']);
                Route::post('update/{id}', ['as' => 'update', 'uses' => 'PageItemController@update']);
                Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PageItemController@destroy']);
                Route::get('active/{id}', ['as' => 'active', 'uses' => 'PageItemController@active']);
                Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'PageItemController@destroyFile']);
            });
        });

        //KEYWORDS
        Route::group(['prefix' => 'keyword', 'as' => 'keyword.', 'namespace' => 'Keyword'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'KeywordController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'KeywordController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'KeywordController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'KeywordController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'KeywordController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'KeywordController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'KeywordController@active']);
        });

        //SEO PAGES
        Route::group(['prefix' => 'seo-page', 'as' => 'seo-page.', 'namespace' => 'SeoPage'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'SeoPageController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'SeoPageController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'SeoPageController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'SeoPageController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'SeoPageController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'SeoPageController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'SeoPageController@active']);
        });

        //FORMS
        Route::group(['prefix' => 'form', 'as' => 'form.', 'namespace' => 'Form'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'FormController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'FormController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'FormController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'FormController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'FormController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'FormController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'FormController@active']);

            //EMAILS
            Route::group(['prefix' => 'email', 'as' => 'email.'], function () {
                Route::get('{id}', ['as' => 'index', 'uses' => 'FormEmailController@index']);
                Route::post('store', ['as' => 'store', 'uses' => 'FormEmailController@store']);
                Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'FormEmailController@destroy']);
            });
        });

        //CONFIGURATIONS
        Route::group(['prefix' => 'configuration', 'as' => 'configuration.', 'namespace' => 'Configuration'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'ConfigurationController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'ConfigurationController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ConfigurationController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ConfigurationController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'ConfigurationController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ConfigurationController@destroy']);
        });

        //USERS
        Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'UserController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'UserController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UserController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'UserController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'UserController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'UserController@active']);
            Route::get('destroyImage/{id}', ['as' => 'destroyImage', 'uses' => 'UserController@destroyImage']);

            Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
                Route::get('{id}', ['as' => 'edit', 'uses' => 'UserPasswordController@edit']);
                Route::post('update/{id}', ['as' => 'update', 'uses' => 'UserPasswordController@update']);
            });
        });
    });

});