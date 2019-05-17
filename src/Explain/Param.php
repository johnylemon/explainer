<?php

namespace Lemon\Explainer\Explain;

use Exception;

class Param
{
    protected $name;
    protected $type;
    protected $description = '';
    protected $required = FALSE;
    protected $default = NULL;
    protected $possible = NULL;

    final public function data() : array
    {
        return [
            'description' => $this->description,
            'required' => $this->required,
            'default' => $this->default,
            'possible' => $this->possible,
            'name' => $this->name,
            'type' => $this->type
        ];
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function make(string $type, string $name) : Param
    {
        return (new static($name))->type($type);
    }

    public static function __callStatic(string $name, array $args = []) : Param
    {
        if(!in_array($name, ['string', 'array', 'boolean', 'bool', 'integer', 'int']))
            throw new Exception('Invalid param type');

        return static::make($name, $args[0]);
    }

    public function type(string $type) : Param
    {
        $this->type = $type;

        return $this;
    }

    public function possible(array $possiblities) : Param
    {
        $this->possible = $possiblities;

        return $this;
    }

    public function default($default = TRUE) : Param
    {
        $this->default = $default;

        return $this;
    }

    public function required(bool $required = TRUE) : Param
    {
        $this->required = $required;

        return $this;
    }

    public function description(string $description) : Param
    {
        $this->description = $description;

        return $this;
    }
}
