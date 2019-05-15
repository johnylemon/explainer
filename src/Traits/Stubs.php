<?php

namespace Lemon\Explainer\Traits;

trait Stubs
{
    protected function stub($name, $target, array $replacements)
    {
        $contents = file_get_contents($this->stubPath($name));
        $contents = str_replace(array_keys($replacements), array_values($replacements), $contents);
        file_put_contents($this->stubTarget($target), $contents);
    }

    protected function stubsPath()
    {
        return __DIR__.'/../../stubs/';
    }

    protected function stubPath($name)
    {
        return $this->stubsPath().$name.'.stub';
    }

    protected function stubTarget($target)
    {
        return $target.'.php';
    }

    protected function createDirectory($path)
    {
        if(file_exists($path))
            return;

        $segments = explode(DIRECTORY_SEPARATOR, $path);

        $current = '';

        foreach($segments as $segment)
        {
            $current .= DIRECTORY_SEPARATOR.$segment;
            file_exists($current) || mkdir($current, 0755);
        }
    }
}
