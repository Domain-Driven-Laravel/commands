<?php

namespace DomainDrivenLaravel\Commands\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use DomainDrivenLaravel\Commands\Console\Traits\DomainCommandTrait;

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

    protected function subdirectoryName(): string
    {
        return 'DataTransferObjects';
    }
}
