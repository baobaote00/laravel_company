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
                 * Style view name
                 */
                'package-slideshow::admin.style-items',
                'package-slideshow::admin.style-item',
                'package-slideshow::admin.style-edit',
                'package-slideshow::admin.style-form',
                'package-slideshow::admin.style-search',

    ], function ($view) {
        /**
         * $plang-admin
         * $plang-front
         */
        $plang_admin = 'slideshow-admin';
        $plang_front = 'slideshow-front';

        /**
         * $sidebar_items
         */
        $sitebar_items = [
            /**
             * Add new style
             */
            trans('slideshow-admin.sidebar.add-style') => [
                'url' => URL::route('styles.edit', []),
                'icon' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>'
            ],
            /**
             * List of style
             */
            trans('slideshow-admin.sidebar.list-style') => [
                "url" => URL::route('styles.list', []),
                'icon' => '<i class="fa fa-list-ul" aria-hidden="true"></i>'
            ],
        ];


        /**
         * $sorting
         */
        $orders = [
            '' => trans($plang_admin.'.form.no-selected'),
            'id' => trans($plang_admin.'.fields.id-style'),
            'style_name' => trans($plang_admin.'.fields.name-style'),
            'updated_at' => trans($plang_admin.'.fields.updated_at'),
        ];
        $sorting = [
            'label' => $orders,
            'items' => [],
            'url' => []
        ];
        $sortTable = new SortTable();
        $sortTable->setOrders($orders);
        $sortTable->setSorting($sorting);
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
        $view->with('sidebar_items', $sitebar_items);
        $view->with('plang_admin', $plang_admin);
        $view->with('plang_front', $plang_front);
        $view->with('sorting', $sorting);
        $view->with('order_by', $order_by);
});
