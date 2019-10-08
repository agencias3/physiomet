<?php

//Auth::routes();
Route::redirect('/admin', '/wesa/admin/login');

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

    // AJAX
    Route::group(['prefix' => 'ajax', 'as' => 'ajax.', 'namespace' => 'Ajax'], function () {
        Route::get('getAddress/{zip_code}', ['as' => 'getAddress', 'uses' => 'AddressController@getAddress']);
    });

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

    //CATEGORY
    Route::group(['prefix' => 'category', 'as' => 'category.', 'namespace' => 'Category'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'CategoryController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'CategoryController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'CategoryController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CategoryController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'CategoryController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'CategoryController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'CategoryController@active']);
        Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'CategoryController@destroyFile']);
    });

    //PRODUCTS
    Route::group(['prefix' => 'product', 'as' => 'product.', 'namespace' => 'Product'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ProductController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ProductController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ProductController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ProductController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ProductController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ProductController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'ProductController@active']);
        Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'ProductController@destroyFile']);

        //GALERY
        Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'ProductImageController@index']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ProductImageController@destroy']);
            Route::post('upload/{id}', ['as' => 'upload', 'uses' => 'ProductImageController@upload']);
            Route::post('updateLabel/{id}', ['as' => 'updateLabel', 'uses' => 'ProductImageController@updateLabel']);
            Route::post('cover/{id}', ['as' => 'cover', 'uses' => 'ProductImageController@cover']);
            Route::post('order/{id}', ['as' => 'order', 'uses' => 'ProductImageController@order']);
            Route::post('store', ['as' => 'store', 'uses' => 'ProductImageController@store']);
            Route::get('destroyGallery/{id}', ['as' => 'destroyGallery', 'uses' => 'ProductImageController@destroyAll']);
        });

        //FILES
        Route::group(['prefix' => 'file', 'as' => 'file.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'ProductFileController@index']);
            Route::get('create/{id}', ['as' => 'create', 'uses' => 'ProductFileController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ProductFileController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ProductFileController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'ProductFileController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ProductFileController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'ProductFileController@active']);
            Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'ProductFileController@destroyFile']);
        });

        //TEXTS
        Route::group(['prefix' => 'text', 'as' => 'text.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'ProductTextController@index']);
            Route::get('create/{id}', ['as' => 'create', 'uses' => 'ProductTextController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ProductTextController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ProductTextController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'ProductTextController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ProductTextController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'ProductTextController@active']);
            Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'ProductTextController@destroyFile']);
            Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'ProductTextController@destroyFile']);
        });

        //CLIENTS
        Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'ProductClientController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'ProductClientController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ProductClientController@destroy']);
        });


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

    //FAQ
    Route::group(['prefix' => 'faq', 'as' => 'faq.', 'namespace' => 'Faq'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'FaqController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'FaqController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'FaqController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'FaqController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'FaqController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'FaqController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'FaqController@active']);
    });

    //SEGMENTS
    Route::group(['prefix' => 'segment', 'as' => 'segment.', 'namespace' => 'Segment'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'SegmentController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'SegmentController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'SegmentController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'SegmentController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'SegmentController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'SegmentController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'SegmentController@active']);
        Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'SegmentController@destroyFile']);

        //GALERY
        Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'SegmentImageController@index']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'SegmentImageController@destroy']);
            Route::post('upload/{id}', ['as' => 'upload', 'uses' => 'SegmentImageController@upload']);
            Route::post('updateLabel/{id}', ['as' => 'updateLabel', 'uses' => 'SegmentImageController@updateLabel']);
            Route::post('cover/{id}', ['as' => 'cover', 'uses' => 'SegmentImageController@cover']);
            Route::post('order/{id}', ['as' => 'order', 'uses' => 'SegmentImageController@order']);
            Route::post('store', ['as' => 'store', 'uses' => 'SegmentImageController@store']);
            Route::get('destroyGallery/{id}', ['as' => 'destroyGallery', 'uses' => 'SegmentImageController@destroyAll']);
        });

        //CLIENTS
        Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'SegmentClientController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'SegmentClientController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'SegmentClientController@destroy']);
        });

        //PRODUCTS
        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'SegmentProductController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'SegmentProductController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'SegmentProductController@destroy']);
        });

    });

    //STORES
    Route::group(['prefix' => 'store', 'as' => 'store.', 'namespace' => 'Store'], function () {

        Route::get('', ['as' => 'index', 'uses' => 'StoreController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'StoreController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'StoreController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'StoreController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'StoreController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'StoreController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'StoreController@active']);
        Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'StoreController@destroyFile']);
        Route::get('updateDimension', ['as' => 'updateDimension', 'uses' => 'StoreController@updateDimension']);

        //GALERY
        Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'StoreImageController@index']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'StoreImageController@destroy']);
            Route::post('upload/{id}', ['as' => 'upload', 'uses' => 'StoreImageController@upload']);
            Route::post('updateLabel/{id}', ['as' => 'updateLabel', 'uses' => 'StoreImageController@updateLabel']);
            Route::post('cover/{id}', ['as' => 'cover', 'uses' => 'StoreImageController@cover']);
            Route::post('order/{id}', ['as' => 'order', 'uses' => 'StoreImageController@order']);
            Route::post('store', ['as' => 'store', 'uses' => 'StoreImageController@store']);
            Route::get('destroyGallery/{id}', ['as' => 'destroyGallery', 'uses' => 'StoreImageController@destroyAll']);
        });

        //RELATED
        Route::group(['prefix' => 'related', 'as' => 'related.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'StoreRelatedController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'StoreRelatedController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'StoreRelatedController@destroy']);
        });

        //SEGMENTS
        Route::group(['prefix' => 'segment', 'as' => 'segment.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'StoreSegmentController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'StoreSegmentController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'StoreSegmentController@destroy']);
        });

    });

    //MACHINES
    Route::group(['prefix' => 'machine', 'as' => 'machine.', 'namespace' => 'Machine'], function () {

        //MACHINES
        Route::group(['prefix' => 'machine', 'as' => 'machine.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'MachineController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'MachineController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'MachineController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'MachineController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'MachineController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'MachineController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'MachineController@active']);

            //GALERY
            Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
                Route::get('{id}', ['as' => 'index', 'uses' => 'MachineImageController@index']);
                Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'MachineImageController@destroy']);
                Route::post('upload/{id}', ['as' => 'upload', 'uses' => 'MachineImageController@upload']);
                Route::post('updateLabel/{id}', ['as' => 'updateLabel', 'uses' => 'MachineImageController@updateLabel']);
                Route::post('cover/{id}', ['as' => 'cover', 'uses' => 'MachineImageController@cover']);
                Route::post('order/{id}', ['as' => 'order', 'uses' => 'MachineImageController@order']);
                Route::post('store', ['as' => 'store', 'uses' => 'MachineImageController@store']);
                Route::get('destroyGallery/{id}', ['as' => 'destroyGallery', 'uses' => 'MachineImageController@destroyAll']);
            });

            //FILES
            Route::group(['prefix' => 'file', 'as' => 'file.'], function () {
                Route::get('/{id}', ['as' => 'index', 'uses' => 'MachineFileController@index']);
                Route::get('create/{id}', ['as' => 'create', 'uses' => 'MachineFileController@create']);
                Route::post('store', ['as' => 'store', 'uses' => 'MachineFileController@store']);
                Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'MachineFileController@edit']);
                Route::post('update/{id}', ['as' => 'update', 'uses' => 'MachineFileController@update']);
                Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'MachineFileController@destroy']);
                Route::get('active/{id}', ['as' => 'active', 'uses' => 'MachineFileController@active']);
                Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'MachineFileController@destroyFile']);
            });

        });

        //CATEGORY
        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'CategoryMachineController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'CategoryMachineController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'CategoryMachineController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CategoryMachineController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'CategoryMachineController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'CategoryMachineController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'CategoryMachineController@active']);
        });
    });


    //PARTS
    Route::group(['prefix' => 'part', 'as' => 'part.', 'namespace' => 'Part'], function () {

        //PARTS
        Route::group(['prefix' => 'part', 'as' => 'part.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'PartController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'PartController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'PartController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'PartController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'PartController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PartController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'PartController@active']);
            Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'PartController@destroyFile']);
        });

        //CATEGORY
        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'CategoryPartController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'CategoryPartController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'CategoryPartController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CategoryPartController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'CategoryPartController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'CategoryPartController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'CategoryPartController@active']);
        });

        //CONTACT
        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'PartContactController@index']);
            Route::get('show/{id}', ['as' => 'show', 'uses' => 'PartContactController@show']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'PartContactController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PartContactController@destroy']);
            Route::get('destroyAllMessages', ['as' => 'destroyAllMessages', 'uses' => 'PartContactController@destroyAllMessages']);
            Route::get('export', ['as' => 'export', 'uses' => 'PartContactController@export']);
        });

    });

    //CONSTRUCITONS
    Route::group(['prefix' => 'construction', 'as' => 'construction.', 'namespace' => 'Construction'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ConstructionController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ConstructionController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ConstructionController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ConstructionController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ConstructionController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ConstructionController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'ConstructionController@active']);

        //GALERY
        Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'ConstructionImageController@index']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ConstructionImageController@destroy']);
            Route::post('upload/{id}', ['as' => 'upload', 'uses' => 'ConstructionImageController@upload']);
            Route::post('updateLabel/{id}', ['as' => 'updateLabel', 'uses' => 'ConstructionImageController@updateLabel']);
            Route::post('cover/{id}', ['as' => 'cover', 'uses' => 'ConstructionImageController@cover']);
            Route::post('order/{id}', ['as' => 'order', 'uses' => 'ConstructionImageController@order']);
            Route::post('store', ['as' => 'store', 'uses' => 'ConstructionImageController@store']);
            Route::get('destroyGallery/{id}', ['as' => 'destroyGallery', 'uses' => 'ConstructionImageController@destroyAll']);
        });
    });

    //CLIENTS
    Route::group(['prefix' => 'client', 'as' => 'client.', 'namespace' => 'Client'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ClientController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ClientController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ClientController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ClientController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ClientController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ClientController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'ClientController@active']);
        Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'ClientController@destroyFile']);
    });

    //PARTNER
    Route::group(['prefix' => 'partner', 'as' => 'partner.', 'namespace' => 'Partner'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'PartnerController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'PartnerController@show']);
        Route::get('export', ['as' => 'export', 'uses' => 'PartnerController@export']);
        Route::get('exportAll', ['as' => 'exportAll', 'uses' => 'PartnerController@exportAll']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PartnerController@destroy']);
    });

    //LANDING PAGE
    Route::group(['prefix' => 'landing-page', 'as' => 'landing-page.', 'namespace' => 'LandingPage'], function () {

        Route::get('', ['as' => 'index', 'uses' => 'LandingPageController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'LandingPageController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'LandingPageController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'LandingPageController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'LandingPageController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'LandingPageController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'LandingPageController@active']);
        Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'LandingPageController@destroyFile']);

        //PRODUCT
        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
            Route::get('/{id}', ['as' => 'index', 'uses' => 'LandingPageProductController@index']);
            Route::get('create/{id}', ['as' => 'create', 'uses' => 'LandingPageProductController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'LandingPageProductController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'LandingPageProductController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'LandingPageProductController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'LandingPageProductController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'LandingPageProductController@active']);
            Route::get('destroyFile/{id}/{name}', ['as' => 'destroyFile', 'uses' => 'LandingPageProductController@destroyFile']);
        });

        //CONTACT
        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('', ['as' => 'all', 'uses' => 'LandingPageContactController@all']);
            Route::get('{id}', ['as' => 'index', 'uses' => 'LandingPageContactController@index']);
            Route::get('show/{id}', ['as' => 'show', 'uses' => 'LandingPageContactController@show']);
            Route::get('export/{id}', ['as' => 'export', 'uses' => 'LandingPageContactController@export']);
            Route::get('exportAll', ['as' => 'exportAll', 'uses' => 'LandingPageContactController@exportAll']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'LandingPageContactController@destroy']);
        });

        //CONFIGURATIONS
        Route::group(['prefix' => 'configuration', 'as' => 'configuration.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'LandingPageConfigurationController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'LandingPageConfigurationController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'LandingPageConfigurationController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'LandingPageConfigurationController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'LandingPageConfigurationController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'LandingPageConfigurationController@destroy']);
        });
    });

    //TIME LINE
    Route::group(['prefix' => 'time-line', 'as' => 'time-line.', 'namespace' => 'TimeLine'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ClientController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ClientController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ClientController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ClientController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ClientController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ClientController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'ClientController@active']);
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

            //SERVICES
            Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
                Route::get('{id}', ['as' => 'index', 'uses' => 'PostServiceController@index']);
                Route::post('store', ['as' => 'store', 'uses' => 'PostServiceController@store']);
                Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'PostServiceController@destroy']);
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

    //BUDGET
    Route::group(['prefix' => 'budget', 'as' => 'budget.', 'namespace' => 'Budget'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'BudgetController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'BudgetController@show']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'BudgetController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'BudgetController@destroy']);
        Route::get('destroyAllMessages', ['as' => 'destroyAllMessages', 'uses' => 'BudgetController@destroyAllMessages']);
        Route::get('export', ['as' => 'export', 'uses' => 'BudgetController@export']);
    });

    //WORK
    Route::group(['prefix' => 'work', 'as' => 'work.', 'namespace' => 'Work'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'WorkController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'WorkController@show']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'WorkController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'WorkController@destroy']);
        Route::get('destroyAllMessages', ['as' => 'destroyAllMessages', 'uses' => 'WorkController@destroyAllMessages']);
        Route::get('export', ['as' => 'export', 'uses' => 'WorkController@export']);
    });

    //TECHNICAL ASSISTANCES
    Route::group(['prefix' => 'technical-assistance', 'as' => 'technical-assistance.', 'namespace' => 'TechnicalAssistance'], function () {

        //TECHNICAL ASSISTANCES
        Route::group(['prefix' => 'technical-assistance', 'as' => 'technical-assistance.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'TechnicalAssistanceController@index']);
            Route::get('show/{id}', ['as' => 'show', 'uses' => 'TechnicalAssistanceController@show']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'TechnicalAssistanceController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TechnicalAssistanceController@destroy']);
            Route::get('destroyAllMessages', ['as' => 'destroyAllMessages', 'uses' => 'TechnicalAssistanceController@destroyAllMessages']);
            Route::get('export', ['as' => 'export', 'uses' => 'TechnicalAssistanceController@export']);
        });

        //TYPE PRODUCTS
        Route::group(['prefix' => 'type-product', 'as' => 'type-product.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'TypeProductController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'TypeProductController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'TypeProductController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TypeProductController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'TypeProductController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TypeProductController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'TypeProductController@active']);
        });

        //FLUIDS
        Route::group(['prefix' => 'fluid', 'as' => 'fluid.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'FluidController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'FluidController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'FluidController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'FluidController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'FluidController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'FluidController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'FluidController@active']);
        });

        //COMPONENTS
        Route::group(['prefix' => 'component', 'as' => 'component.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'ComponentController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'ComponentController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ComponentController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ComponentController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'ComponentController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ComponentController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'ComponentController@active']);
        });

        //DEFECTS
        Route::group(['prefix' => 'defect', 'as' => 'defect.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'DefectController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'DefectController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'DefectController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'DefectController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'DefectController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'DefectController@destroy']);
            Route::get('active/{id}', ['as' => 'active', 'uses' => 'DefectController@active']);
        });
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