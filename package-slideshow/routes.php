<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('slideshow', [
    'as' => 'slideshow',
    'uses' => 'Foostart\Slideshow\Controllers\Front\SlideshowFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
                  'namespace' => 'Foostart\Slideshow\Controllers\Admin',
        ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage slideshow
          |-----------------------------------------------------------------------
          | 1. List of slideshows
          | 2. Edit slideshow
          | 3. Delete slideshow
          | 4. Add new slideshow
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/slideshows', [
            'as' => 'slideshows.list',
            'uses' => 'SlideshowAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/slideshows/edit', [
            'as' => 'slideshows.edit',
            'uses' => 'SlideshowAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/slideshows/copy', [
            'as' => 'slideshows.copy',
            'uses' => 'SlideshowAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/slideshows/edit', [
            'as' => 'slideshows.post',
            'uses' => 'SlideshowAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/slideshows/delete', [
            'as' => 'slideshows.delete',
            'uses' => 'SlideshowAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/slideshows/trash', [
            'as' => 'slideshows.trash',
            'uses' => 'SlideshowAdminController@trash'
        ]);

        /**
         * configs
        */
        Route::get('admin/slideshows/config', [
            'as' => 'slideshows.config',
            'uses' => 'SlideshowAdminController@config'
        ]);

        Route::post('admin/slideshows/config', [
            'as' => 'slideshows.config',
            'uses' => 'SlideshowAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/slideshows/lang', [
            'as' => 'slideshows.lang',
            'uses' => 'SlideshowAdminController@lang'
        ]);

        Route::post('admin/slideshows/lang', [
            'as' => 'slideshows.lang',
            'uses' => 'SlideshowAdminController@lang'
        ]);

        /*
          |-----------------------------------------------------------------------
          | Manage styles
          |-----------------------------------------------------------------------
          | 1. List of styles
          | 2. Edit style
          | 3. Delete style
          | 4. Add new style
          |
        */

        /**
         * list
         */
        Route::get('admin/styles', [
            'as' => 'styles.list',
            'uses' => 'StyleAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/styles/edit', [
            'as' => 'styles.edit',
            'uses' => 'StyleAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/styles/copy', [
            'as' => 'styles.copy',
            'uses' => 'StyleAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/styles/edit', [
            'as' => 'styles.post',
            'uses' => 'StyleAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/styles/delete', [
            'as' => 'styles.delete',
            'uses' => 'StyleAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/styles/trash', [
            'as' => 'styles.trash',
            'uses' => 'StyleAdminController@trash'
        ]);


    });
});
