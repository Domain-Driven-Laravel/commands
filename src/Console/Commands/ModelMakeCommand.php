<?php

namespace MennoVanHout\LaravelDomainDrivenCommands\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\ModelMakeCommand as Command;
use MennoVanHout\LaravelDomainDrivenCommands\Console\Traits\DomainCommandTrait;

class ModelMakeCommand extends Command
{
    use DomainCommandTrait;

    protected $name = 'make:model';
    protected $signature = 'make:model {--force} {domain} {name} {--api} {--pivot} {--all} {--factory} {--seed} {--migration} {--controller} {--policy} {--resource}';

    public function __construct()
    {
        parent::__construct(new Filesystem());
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $domain = $this->argument('domain');

        return "{$rootNamespace}\\{$domain}\\Models";
    }
}
