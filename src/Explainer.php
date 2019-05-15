<?php

namespace Lemon\Explainer;

use Lemon\Declaimer\Routing\Route;
use Illuminate\Routing\RouteCollection;
use JsonSerializable;

class Explainer
{
    protected static $_definitions = [];

    public static function register($route, $classname)
    {
        static::$_definitions[] = new Explain($route, $classname);
    }

    public function toArray()
    {
        return [
            'authorization' => '',
            'description' => '',
            'version' => '',
            'author' => '',
            'routes' => $this->mapRoutes()->all()
        ];
    }

    public function definitions()
    {
        return static::$_definitions;
    }

    protected function mapRoutes()
    {
        return collect($this->definitions())->map(function($item){
            return $item->data();
        });
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function __toString()
    {
        return json_encode($this->jsonSerialize());
    }
}
