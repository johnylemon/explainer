<?php

namespace Lemon\Explainer\Explain;

abstract class Route
{
    protected $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    abstract public function description() : string;
    abstract public function params() : array;
    abstract public function input() : array;
    abstract public function query() : array;
    abstract public function requests() : array;
    abstract public function responses() : array;
    abstract public function deprecated() : bool;
}
