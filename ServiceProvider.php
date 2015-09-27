<?php

namespace Tee\Gallery;
use Event;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        Event::listen('admin::menu.load', function($menu) {
            $format = '<i class="fa fa-picture-o"></i>&nbsp;&nbsp;<span>%s</span>';
            $menu->add(
                sprintf($format, 'Fotos'),
                route('admin.gallery.index')
            );
        });
    }
}