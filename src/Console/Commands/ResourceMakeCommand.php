<?php

namespace DomainDrivenLaravel\Commands\Console\Commands;

use DomainDrivenLaravel\Commands\Console\Traits\AppLayerCommandTrait;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\ResourceMakeCommand as Command;

class ResourceMakeCommand extends Command
{
    use AppLayerCommandTrait;

    protected $name = 'make:resource';
    protected $signature = 'make:resource {app_layer} {domain} {name} {--collection}';

    public function __construct()
    {
        parent::__construct(new Filesystem());
    }

    protected function subdirectoryName(): string
    {
        return 'Resources';
    }
}
