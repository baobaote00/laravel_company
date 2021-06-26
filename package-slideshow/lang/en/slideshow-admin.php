<?php

return [

    /*
    |-----------------------------------------------------------------------
    | MAIN MENU
    |-----------------------------------------------------------------------
    | Top menu
    |
    */
    'menus' => [
        'top-menu' => 'Slideshows',
        'undo' => 'Undo slideshows',
    ],





    /*
    |-----------------------------------------------------------------------
    | SIDEBAR
    |-----------------------------------------------------------------------
    | Left side bar
    |
    |
    |
    */
    'sidebar' => [
        'list' => 'Items',
        'add' => 'Add new',
        'trash' => 'Trash',
        'config' => 'Configurations',
        'lang' => 'Languages',
        'style' => 'Style',
        'category' => 'Categories',
        'add-style' => 'Add style',
        'list-style' => 'List of styles',
    ],





    /*
    |-----------------------------------------------------------------------
    | Table column
    |-----------------------------------------------------------------------
    | The list of columns in table
    |
    */
    'columns' => [
        'order' => '#',
        'name' => 'slideshow name',
        'operations' => 'Operations',
        'updated_at' => 'Updated at',
        'filename' => 'File name',
    ],


    /*
    |-----------------------------------------------------------------------
    | Pages
    |-----------------------------------------------------------------------
    | Pages
    |
    */
    'pages' => [
        'title-list' => 'List of slideshows',
        'title-list-search' => 'Search results',
        'title-edit' => 'Edit slideshow',
        'title-add' => 'Add new slideshow',
        'title-delete' => 'Delete slideshow',
        'title-config' => 'Current configurations',
        'title-lang' => 'Manage languages',
    ],





    /*
    |-----------------------------------------------------------------------
    | Button
    |-----------------------------------------------------------------------
    | The list of buttons
    |
    */
    'buttons' => [
        'search' => 'Search',
        'reset' => 'Resest',
        'add' => 'Add',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete-in-trash' => 'In trash',
        'delete-forever' => 'Forever',
    ],





    /*
    |-----------------------------------------------------------------------
    | Form
    |-----------------------------------------------------------------------
    | The list of elements in form
    |
    |
    */
    'form' => [
        'keyword' => 'Keyword',
        'sorting' => 'Sorting',
        'no-selected' => 'No selected',
        'status' => 'Status',
    ],





    /*
    |-----------------------------------------------------------------------
    | Description
    |-----------------------------------------------------------------------
    | Description
    |
    */
    'description' => [
        'form' => 'slideshow form',
        'update' => 'Update slideshow',
        'name' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'category' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'list' => 'List of items',
        'counters' => 'There are <b>:number</b> items',
        'counter' => 'There is <b>:number</b> item',
        'not-found' => 'Not found items',
        'config' => 'List of configurations',
        'lang' => 'List of languages',
    ],



    /*
    |-----------------------------------------------------------------------
    | Error
    |-----------------------------------------------------------------------
    | Show error message
    |
    |
    |
    */
    'errors' => [
        'required' => ':attribute is required',
        'required_length' => 'Allow from: <b>:minlength</b> to <b>:maxlength</b>. characters',
    ],




    /*
    |-----------------------------------------------------------------------
    | FIELDS
    |-----------------------------------------------------------------------
    | Column name in table
    |
    |
    |
    */
    'fields' => [
        'id' => 'Slideshow ID',
        'name' => 'Slideshow name',
        'description' => 'Description',
        'overview' => 'Overview',
        'slug' => 'Slug',
        'updated_at' => 'Updated at',
        'id-style' => 'Style ID',
        'name-style' => 'Style name',
    ],




    /*
    |-----------------------------------------------------------------------
    | LABLES
    |-----------------------------------------------------------------------
    | The lables of element in form
    |
    |
    |
    */
    'labels' => [
        'name' => 'Slideshow name',
        'overview' => 'Slideshow overview',
        'description' => 'Slideshow description',
        'category' => 'Category name',
        'title-search' => 'Search slideshow',
        'title-backup' => 'Backups',
        'config' => 'Configurations',
        'name-style' => 'New style',
        'view-file' => 'View file',
        'view-content' => 'View content',
        'style-select' => 'Slect style',
        'images' => 'Images',
        'image' => 'Image',
    ],





    /*
    |-----------------------------------------------------------------------
    | TABS
    |-----------------------------------------------------------------------
    | The name of tab
    |
    |
    |
      */
    'tabs' => [
        'menu_1' => 'Basic',
        'menu_2' => 'Advance',
        'menu_3' => 'Other',
        'menu_4' => 'Other',
        'menu_5' => 'Other',
        'menu_6' => 'Other',
        'menu_7' => 'Other',
    ],





    /*
    |-----------------------------------------------------------------------
    | HEADING
    |-----------------------------------------------------------------------
    |
    |
    |
    |
    */
    'headings' => [
        'form-search' => 'Search slideshows',
        'list' => 'List of slideshows',
        'search' => 'Search results',
    ],





    /*
    |-----------------------------------------------------------------------
    | CONFIRMS
    |-----------------------------------------------------------------------
    | List of messages for confirm
    |
    |
    |
    */
    'confirms' => [
        'delete' => 'Are you sure you want to delete this item?',
    ],





    /*
    |-----------------------------------------------------------------------
    | ACTIONS
    |-----------------------------------------------------------------------
    |
    |
    |
    |
    */
    'actions' => [
        'add-ok' => 'Add item successfully',
        'add-error' => 'Add item failed',
        'edit-ok' => 'Edit item successfully',
        'edit-error' => 'Edit item failed',
        'delete-ok' => 'Delete item successfully',
        'delete-error' => 'Delete item failed',
    ],





    /*
    |-----------------------------------------------------------------------
    | Descriptions
    |-----------------------------------------------------------------------
    | Descriptions
    |
    */
    'descriptions' => [
        'form' => 'Slideshow form',
        'update' => 'Update slideshow',
        'name' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'slug' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'category' => 'Click <a href=":href">here</a> to manage list of categories by token.',
        'slideshow' => 'Click <a href=":href">here</a> to manage list of slideshow',
        'overview' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'image' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'files' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'status' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'list' => 'List of items',
        'counters' => 'There are <b>:number</b> items',
        'counter' => 'There is <b>:number</b> item',
        'not-found' => 'Not found items',
        'config' => 'List of configurations',
        'lang' => 'List of languages',
        'form-style' => 'Style form',
        'name-style' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'view-style' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'view-content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'style-select' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'images' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
    ],





    /*
    |-----------------------------------------------------------------------
    | Order by
    |-----------------------------------------------------------------------
    | Order by
    |
    */
    'order_by' => [
        'asc' => 'ASC',
        'desc' => 'DESC'
    ],









    /*
    |-----------------------------------------------------------------------
    | Hint
    |-----------------------------------------------------------------------
    | The list of hint
    |
    */
    'hint'  => [
        'delete-forever' => 'Delete forever',
        'delete-in-trash' => 'Delete in trash',
    ],

];