<?php

namespace DomainDrivenLaravel\Commands\Console\Commands;

use DomainDrivenLaravel\Commands\Console\Traits\DomainCommandTrait;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\MailMakeCommand as Command;

class MailMakeCommand extends Command
{
    use DomainCommandTrait;

    protected $name = 'make:mail';
    protected $signature = 'make:mail {domain} {name} {--markdown}';

    public function __construct()
    {
        parent::__construct(new Filesystem());
    }

    protected function subdirectoryName(): string
    {
        return 'Mails';
    }
}
