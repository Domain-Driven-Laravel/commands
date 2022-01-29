<?php

namespace DomainDrivenLaravel\Commands\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\JobMakeCommand as Command;
use DomainDrivenLaravel\Commands\Console\Traits\DomainCommandTrait;

class JobMakeCommand extends Command
{
    use DomainCommandTrait;

    protected $name = 'make:model';
    protected $signature = 'make:job {domain} {name} {--sync}';

    public function __construct()
    {
        parent::__construct(new Filesystem());
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $domain = $this->argument('domain');

        return "{$rootNamespace}\\{$domain}\\Jobs";
    }
}
