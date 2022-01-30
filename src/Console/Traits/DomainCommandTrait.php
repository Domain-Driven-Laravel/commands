<?php

namespace DomainDrivenLaravel\Commands\Console\Traits;

use Illuminate\Support\Str;

trait DomainCommandTrait
{
    abstract public function argument($key = null);
    abstract protected function subdirectoryName(): string;

    protected function rootNamespace(): string
    {
        return config('ddd-commands.domain.root_namespace');
    }

    protected function getPath($name): string
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return config('ddd-commands.domain.path').str_replace('\\', '/', $name).'.php';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $domain = $this->argument('domain');

        return "{$rootNamespace}\\{$domain}\\{$this->subdirectoryName()}";
    }
}
