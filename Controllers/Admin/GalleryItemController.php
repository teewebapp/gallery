<?php

namespace Tee\Gallery\Controllers\Admin;

use Route;
use Input;
use Tee\Admin\Controllers\ResourceController;
use Tee\Gallery\Models\Gallery;
use Tee\Gallery\Models\GalleryItem;
use Tee\System\Breadcrumbs;
use Symfony\Component\HttpKernel\Exception\HttpException;

class GalleryItemController extends ResourceController
{
    public $resourceTitle = 'Itens da Galeria';

    public $resourceName = 'gallery_item';

    public $parentResourceName = 'gallery';

    public $modelClass = 'Tee\\Gallery\\Models\\GalleryItem';

    public $moduleName = 'gallery';

    public $orderable = true;

    public function __construct()
    {
        Breadcrumbs::addCrumb(
            'Galerias',
            route("admin.gallery.index")
        );

        parent::__construct();
    }

    public function beforeSave($galleryItem) {
        $gallery = Gallery::findOrFail(Route::current()->parameter('gallery'));

        if(!$gallery)
            throw new HttpException(404, 'Galeria não encontrada');

        $galleryItem->gallery()->associate($gallery);
    }

    public function beforeList($queryBuilder) {
        $gallery = Gallery::findOrFail(Route::current()->parameter('gallery'));

        return $queryBuilder
            ->where('gallery_id', $gallery->id)
            ->orderBy('order', 'asc');
    }

    public function order()
    {
        $item1 = GalleryItem::find((int)Input::get('id1'));
        $item2 = GalleryItem::find((int)Input::get('id2'));

        $items = $item1->gallery->items;
        $i = 0;
        foreach($items as $item) {
            $item->order = $i;
            $item->save();
            $i += 1;
        }

        $order1 = Input::get('order1');
        $order2 = Input::get('order2');

        $item1->order = (int)$order1;
        $item2->order = (int)$order2;

        $item1->save();
        $item2->save();

        return json_encode(['success' => true]);
    }
}