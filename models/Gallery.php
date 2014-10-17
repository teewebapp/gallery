<?php

namespace Tee\Gallery\Models;

use Tee\System\Models\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

use URL;

class Gallery extends Model implements SluggableInterface, StaplerableInterface {
    use SluggableTrait;
    use EloquentTrait; // Stapler Image Upload

    protected $defaults = array();

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    public static $rules = [
        'title' => 'required'
    ];
    protected $fillable = ['image', 'title', 'keywords', 'description'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'medium' => '470x330',
            ]
        ]);

        parent::__construct($attributes);
    }

    public static function getAttributeNames() {
        return array(
            'title' => 'Título',
            'description' => 'Descrição',
            'keywords' => 'Palavras Chave',
            'image' => 'Imagem',
        );
    }

    public function getImageUrlAttribute() {
        if($this->image_file_name)
            return $this->image->url('medium');
        else
            return URL::to('img/no-photo.jpg');
    }

    public function getUrlAttribute() {
        return URL::route('gallery.show', $this->slug);
    }
}