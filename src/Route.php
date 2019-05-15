<?php

namespace Lemon\Explainer;

class Route
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __call($method, $aattributes)
    {
        return array_key_exists($method, $this->data) ? $this->data[$method] : NULL;
    }
}
