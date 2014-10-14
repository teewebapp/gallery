<?php

namespace Tee\Gallery\Controllers;

use Tee\Admin\Controllers\ResourceController;

class GalleryController extends ResourceController {
    public $resourceTitle = 'Galeria';
    public $resourceName = 'gallery';
    public $modelClass = 'App\\Modules\\Gallery\\Models\\Gallery';
    public $moduleName = 'gallery';
}