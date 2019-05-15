<?php

namespace Lemon\Explainer;

use Illuminate\Routing\RouteCollection;
use JsonSerializable;

class Explain implements JsonSerializable
{
    protected $route;
    protected $classname;

    public function __construct(array $route, $classname)
    {
        $this->route = new Route($route);
        $this->classname = $classname;
    }

    public function explainer()
    {
        return app()->makeWith($this->classname, ['route' => $this->route]);
    }

    protected function explainData()
    {
        $class = $this->explainer();

        return [
            'deprecated' => $class->deprecated(),
            'description' => $class->description(),
            'requests' => $class->requests(),
            'responses' => $class->responses(),
            'params' => [
                'route' => $this->mapParams($class->params()),
                'input' => $this->mapParams($class->input()),
                'query' => $this->mapParams($class->query()),
            ]
        ];
    }

    protected function routeData()
    {
        return [
            'domain'    => $this->route->domain(),
            'method'    => $this->route->method(),
            'uri'       => $this->route->uri(),
        ];
    }

    public function data()
    {
        return array_merge($this->routeData(), $this->explainData());
    }

    protected function mapParams(array $params)
    {
        return collect($params)->map(function($param){
            return $param->data();
        })->all();
    }

    public function jsonSerialize()
    {
        return $this->data();
    }
}
