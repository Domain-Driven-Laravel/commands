<?php

namespace MennoVanHout\LaravelDomainDrivenCommands\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use MennoVanHout\LaravelDomainDrivenCommands\Console\Commands\ActionMakeCommand;
use MennoVanHout\LaravelDomainDrivenCommands\Console\Commands\DataTransferObjectMakeCommand;
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
        $this->publishes([
            __DIR__.'/../config/ddd-commands.php' => config_path('ddd-commands.php'),
        ], 'ddd-commands');

        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands(
            [
                ModelMakeCommand::class,
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
            'command.make.action',
            'command.make.dto',
        ];
    }
}
