<?php

namespace Lemon\Explainer;

use Parsedown;

class Parser
{
    protected $parser;

    public function __construct(Parsedown $parser)
    {
        $this->parser = $parser;
    }

    public function markdown($text)
    {
        return $this->parser->text($text);
    }
}
