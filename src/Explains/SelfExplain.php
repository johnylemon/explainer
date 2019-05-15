<?php

namespace Lemon\Explainer\Explains;

use Lemon\Explainer\Explain\Route;

class SelfExplain extends Route
{
    public function description() : string
    {
        return 'API docs route';
    }

    public function params() : array
    {
        return [];
    }

    public function input() : array
    {
        return [];
    }

    public function query() : array
    {
        return [];
    }

    public function requests() : array
    {
        return [];
    }

    public function responses() : array
    {
        return [];
    }

    public function deprecated() : bool
    {
        return FALSE;
    }
}
