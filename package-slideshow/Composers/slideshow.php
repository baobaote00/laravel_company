<?php

use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
use Foostart\Category\Helpers\FooCategory;
use Foostart\Category\Helpers\SortTable;

/*
|-----------------------------------------------------------------------
| GLOBAL VARIABLES
|-----------------------------------------------------------------------
|   $sidebar_items
|   $sorting
|   $order_by
|   $plang_admin = 'slideshow-admin'
|   $plang_front = 'slideshow-front'
*/
View::composer([
                /**
                 * Slideshow view
                 */
                'package-slideshow::admin.slideshow-edit',
                'package-slideshow::admin.slideshow-form',
                'package-slideshow::admin.slideshow-items',
                'package-slideshow::admin.slideshow-item',
                'package-slideshow::admin.slideshow-search',
                'package-slideshow::admin.slideshow-config',
                'package-slideshow::admin.slideshow-lang',
                /**
                 * Style view
                 */
                'package-slideshow::admin.style-edit',
                'package-slideshow::admin.style-form',
                'package-slideshow::admin.style-items',
                'package-slideshow::admin.style-item',
                'package-slideshow::admin.style-search',
    ], function ($view) {
        /**
         * $plang-admin
         * $plang-front
         */
        $plang_admin = 'slideshow-admin';
        $plang_front = 'slideshow-front';

        $fooCategory = new FooCategory();
        $key = $fooCategory->getContextKeyByRef('admin/slideshows');
        $callback_url = base64_encode(url()->current());
        $label = base64_encode(trans('slideshow-admin.menus.undo'));

        /**
         * $sidebar_items
         */
        $sidebar_items =  [
            /**
             * Add new slideshow
             */
            trans('slideshow-admin.sidebar.add') => [
                'url' => URL::route('slideshows.edit', []),
                'icon' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>'
            ],
            /**
             * List of slideshow
             */
            trans('slideshow-admin.sidebar.list') => [
                "url" => URL::route('slideshows.list', []),
                'icon' => '<i class="fa fa-list-ul" aria-hidden="true"></i>'
            ],
            /**
             * Style slideshow
             */
            trans('slideshow-admin.sidebar.style') => [
                "url" => URL::route('styles.list', []),
                'icon' => '<i class="fa fa-sliders" aria-hidden="true"></i>'
            ],
            /**
             * List of categories of slideshow
             */
            trans('slideshow-admin.sidebar.category') => [
                'url'  => URL::route('categories.list',['_key='.$key,
                                                        'callback_url' => $callback_url,
                                                        'label' => $label,
                        ]),
                'icon' => '<i class="fa fa-sitemap" aria-hidden="true"></i>'
            ],
            /**
             * Config slideshow
             */
            trans('slideshow-admin.sidebar.config') => [
                "url" => URL::route('slideshows.config', []),
                'icon' => '<i class="fa fa-braille" aria-hidden="true"></i>'
            ],
            /**
             * Language slideshow
             */
            trans('slideshow-admin.sidebar.lang') => [
                "url" => URL::route('slideshows.lang', []),
                'icon' => '<i class="fa fa-language" aria-hidden="true"></i>'
            ],
        ];

        /**
         * $sorting
         * $order_by
         */
        $orders = [
            '' => trans($plang_admin.'.form.no-selected'),
            'id' => trans($plang_admin.'.fields.id'),
            'slideshow_name' => trans($plang_admin.'.fields.name'),
            'updated_at' => trans($plang_admin.'.fields.updated_at'),
        ];

        $sortTable = new SortTable();
        $sortTable->setOrders($orders);
        $sorting = $sortTable->linkOrders();

        /**
         * $order_by
         */
        $order_by = [
            'asc' => trans('category-admin.order.by-asc'),
            'desc' => trans('category-admin.order.by-des'),
        ];

        /**
         * Send to view
         */
        $view->with('sidebar_items', $sidebar_items );
        $view->with('plang_admin', $plang_admin);
        $view->with('plang_front', $plang_front);
        $view->with('sorting', $sorting);
        $view->with('order_by', $order_by);
});
