<?php

namespace Tee\Gallery;

use Route;

Route::group(array('prefix' => 'admin'), function() {

    Route::resource('gallery', __NAMESPACE__.'\Controllers\Admin\GalleryController',
        array('except' => array('show'))
    );

    Route::resource('gallery.gallery_item', __NAMESPACE__.'\Controllers\Admin\GalleryItemController',
        array('except' => array('show'))
    );

    Route::post('gallery/{gallery}/gallery_item/order', [
        'uses' => __NAMESPACE__.'\Controllers\Admin\GalleryItemController@order',
        'as' => 'admin.gallery.gallery_item.order'
    ]);

});