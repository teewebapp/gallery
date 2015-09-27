<?php

namespace Tee\Gallery\Models;

use Tee\System\Models\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait as ImageUploadTrait;

use URL;

class GalleryItem extends Model implements StaplerableInterface {
    use ImageUploadTrait; 

    protected $defaults = array();

    public static $rules = [
        'description' => 'required',
        'image' => 'required',
    ];
    protected $fillable = ['image', 'description', 'cover'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'medium' => '470x330',
            ]
        ]);

        parent::__construct($attributes);
    }

    public function gallery() {
        return $this->belongsTo(__NAMESPACE__.'\\Gallery');
    }

    public static function getAttributeNames() {
        return array(
            'description' => 'Descrição',
            'cover' => 'Capa da Galeria',
            'image' => 'Imagem',
        );
    }

    public function getImageUrlAttribute() {
        if($this->image_file_name)
            return $this->image->url('medium');
        else
            return URL::to('img/no-photo.jpg');
    }
}