<?php

namespace DomainDrivenLaravel\Commands\Providers;

use DomainDrivenLaravel\Commands\Console\Commands\JobMakeCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use DomainDrivenLaravel\Commands\Console\Commands\ActionMakeCommand;
use DomainDrivenLaravel\Commands\Console\Commands\DataTransferObjectMakeCommand;
use DomainDrivenLaravel\Commands\Console\Commands\ModelMakeCommand;

class DomainDrivenCommandsProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap any application services.
     *
     * @author Menno van Hout <info@mennovanhout.nl>
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ddd-commands.php' => config_path('ddd-commands.php'),
        ], 'ddd-commands');

        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands(
            [
                ModelMakeCommand::class,
                JobMakeCommand::class,
                ActionMakeCommand::class,
                DataTransferObjectMakeCommand::class,
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
        $this->mergeConfigFrom(
            __DIR__.'/../config/ddd-commands.php', 'ddd-commands'
        );

        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->app->extend('command.model.make', function (\Illuminate\Foundation\Console\ModelMakeCommand $command) {
            return new ModelMakeCommand;
        });

        $this->app->extend('command.job.make', function (\Illuminate\Foundation\Console\JobMakeCommand $command) {
            return new JobMakeCommand;
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
            'command.make.model',
            'command.make.job',
            'command.make.action',
            'command.make.dto',
        ];
    }
}
