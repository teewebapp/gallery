<?php

namespace Tee\Gallery\Models;

use Tee\System\Models\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use URL;

class Gallery extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $defaults = array();

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    public static $rules = [
        'title' => 'required'
    ];
    protected $fillable = ['image', 'title', 'keywords', 'description'];

    public static function getAttributeNames()
    {
        return array(
            'title' => 'Título',
            'keywords' => 'Palavras Chave',
        );
    }

    public function scopeSpecial($query, $name)
    {
        return $query->where('special', '=', $name);
    }

    public function items()
    {
        return $this->hasMany(__NAMESPACE__.'\GalleryItem');
    }
}