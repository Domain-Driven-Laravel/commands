<?php

namespace DomainDrivenLaravel\Commands\Console\Traits;

use Illuminate\Support\Str;

trait DomainCommandTrait
{
    abstract public function argument($key = null);

    protected function rootNamespace(): string
    {
        return config('ddd-commands.domain.root_namespace');
    }

    protected function getPath($name): string
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return config('ddd-commands.domain.path').str_replace('\\', '/', $name).'.php';
    }
}
