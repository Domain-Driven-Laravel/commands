<?php

namespace MennoVanHout\LaravelDomainDrivenCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use MennoVanHout\LaravelDomainDrivenCommands\Console\Traits\DomainCommandTrait;

class ActionMakeCommand extends GeneratorCommand
{
    use DomainCommandTrait;

    protected $name = 'make:action';
    protected $signature = 'make:action {domain} {name}';
    protected $description = 'Create a new action class';
    protected $type = 'Action';

    public function __construct()
    {
        parent::__construct(new Filesystem());
    }

    protected function getStub(): string
    {
        return __DIR__ . '/../../stubs/action.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $domain = $this->argument('domain');

        return "{$rootNamespace}\\{$domain}\\Actions";
    }
}
