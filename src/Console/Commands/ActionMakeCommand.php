<?php

namespace DomainDrivenLaravel\Commands\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use DomainDrivenLaravel\Commands\Console\Traits\DomainCommandTrait;

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

    protected function subdirectoryName(): string
    {
        return 'Actions';
    }
}
