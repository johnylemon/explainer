<?php

namespace Lemon\Explainer\Facades;

use Illuminate\Support\Facades\Facade;
use Lemon\Explainer\Parser as ParserClass;

class Parser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ParserClass::class;
    }
}
