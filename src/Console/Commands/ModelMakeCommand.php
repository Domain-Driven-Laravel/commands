<?php

namespace MennoVanHout\LaravelDomainDrivenCommands\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\ModelMakeCommand as Command;

class ModelMakeCommand extends Command
{
    protected $name = 'make:model';
    protected $signature = 'make:model {--force} {domain} {name} {--api} {--pivot} {--all} {--factory} {--seed} {--migration} {--controller} {--policy} {--resource}';

    public function __construct()
    {
        parent::__construct(new Filesystem());
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $domain = $this->argument('domain');

        return "{$rootNamespace}\\..\\Domain\\{$domain}\\Models";
    }
}
