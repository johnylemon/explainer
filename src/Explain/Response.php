<?php

namespace Lemon\Explainer\Explain;

use JsonSerializable;
use Lemon\Explainer\Facades\Parser;

abstract class Response implements JsonSerializable
{
    abstract public function description() : string;
    abstract public function code();

    public function jsonSerialize()
    {
        return [
            'description' => Parser::markdown($this->description()),
            'code' => $this->code()
        ];
    }
}
