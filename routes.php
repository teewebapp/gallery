<?php

namespace Tee\Gallery;

use Route;

Route::group(array('prefix' => 'admin'), function() {

    Route::resource('gallery', __NAMESPACE__.'\Controllers\GalleryController',
        array('except' => array('show'))
    );

    Route::resource('gallery.items', __NAMESPACE__.'\Controllers\ItemController',
        array('except' => array('show'))
    );

});