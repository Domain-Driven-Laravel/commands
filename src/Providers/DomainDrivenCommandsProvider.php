<?php

namespace MennoVanHout\LaravelDomainDrivenCommands\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Filesystem\Filesystem;
use MennoVanHout\LaravelDomainDrivenCommands\Console\Commands\ModelMakeCommand;

class DomainDrivenCommandsProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap any application services.
     *
     * @author Menno van Hout <info@mennovanhout.nl>
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands(
            [
                ModelMakeCommand::class
            ]
        );
    }

    /**
     * Register any application services.
     *
     * @author Menno van Hout <info@mennovanhout.nl>
     */
    public function register()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        //echo get_class($this->app);
        //echo $a_ns = substr(get_class($this->app), 0, strrpos(get_class($this->app), '\\'));

        $this->app->extend('command.model.make', function (\Illuminate\Foundation\Console\ModelMakeCommand $command) {
            //$command->files
            return new ModelMakeCommand;
        });
    }

    /**
     * Provides services.
     *
     * @author Menno van Hout <info@mennovanhout.nl>
     */
    public function provides(): array
    {
        return [
            'command.make.model'
        ];
    }
}
