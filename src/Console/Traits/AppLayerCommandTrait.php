<?php

namespace DomainDrivenLaravel\Commands\Console\Traits;

use Illuminate\Support\Str;

trait AppLayerCommandTrait
{
    abstract public function argument($key = null);
    abstract protected function subdirectoryName(): string;

    protected function rootNamespace(): string
    {
        return config('ddd-commands.app_layer.root_namespace');
    }

    protected function getPath($name): string
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return config('ddd-commands.app_layer.path').str_replace('\\', '/', $name).'.php';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $appLayer = ucfirst($this->argument('app_layer'));
        $domain = ucfirst($this->argument('domain'));

        return "{$rootNamespace}\\{$appLayer}\\{$domain}\\{$this->subdirectoryName()}";
    }
}
