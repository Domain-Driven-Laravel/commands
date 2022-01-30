<?php

namespace DomainDrivenLaravel\Commands\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\ModelMakeCommand as Command;
use DomainDrivenLaravel\Commands\Console\Traits\DomainCommandTrait;

class ModelMakeCommand extends Command
{
    use DomainCommandTrait;

    protected $name = 'make:model';
    protected $signature = 'make:model {--force} {domain} {name} {--api} {--pivot} {--all} {--factory} {--seed} {--migration} {--controller} {--policy} {--resource}';

    public function __construct()
    {
        parent::__construct(new Filesystem());
    }

    protected function subdirectoryName(): string
    {
        return 'Models';
    }
}
