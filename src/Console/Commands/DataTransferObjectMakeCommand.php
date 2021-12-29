<?php

namespace MennoVanHout\LaravelDomainDrivenCommands\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use MennoVanHout\LaravelDomainDrivenCommands\Console\Traits\DomainCommandTrait;

class DataTransferObjectMakeCommand extends GeneratorCommand
{
    use DomainCommandTrait;

    protected $name = 'make:dto';
    protected $signature = 'make:dto {domain} {name}';
    protected $description = 'Create a new dto class';
    protected $type = 'DTO';

    public function __construct()
    {
        parent::__construct(new Filesystem());
    }

    protected function getStub(): string
    {
        return __DIR__ . '/../../stubs/dto.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $domain = $this->argument('domain');

        return "{$rootNamespace}\\{$domain}\\DataTransferObjects";
    }
}
