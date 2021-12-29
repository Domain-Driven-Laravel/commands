<?php

namespace MennoVanHout\LaravelDomainDrivenCommands\Console\Traits;

use Illuminate\Support\Str;

trait DomainCommandTrait
{
    abstract public function argument($key = null);

    protected function rootNamespace(): string
    {
        return 'Domain';
    }

    protected function getPath($name): string
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return 'src/Domain/'.str_replace('\\', '/', $name).'.php';
    }
}
