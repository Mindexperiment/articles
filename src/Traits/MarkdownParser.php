<?php

namespace Agpretto\Articles\Traits;

use Parsedown;

trait MarkdownParser
{
    public function parse($text)
    {
        return (new Parsedown)->text($text);
    }
}
