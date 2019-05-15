<?php

namespace Lemon\Explainer\Explain;

use JsonSerializable;

abstract class Example implements JsonSerializable
{
    abstract public function description() : string;
    abstract public function code();

    public function jsonSerialize()
    {
        return [
            'description' => $this->description(),
            'code' => $this->code()
        ];
    }
}
