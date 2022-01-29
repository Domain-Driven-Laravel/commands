# Laravel support for domain driven design
[![Latest Version on Packagist](https://img.shields.io/packagist/v/domain-driven-laravel/commands.svg?style=for-the-badge)](https://packagist.org/packages/domain-driven-laravel/commands)
[![License](https://img.shields.io/github/license/domain-driven-laravel/commands?style=for-the-badge)](https://github.com/domain-driven-laravel/commands/blob/main/LICENSE.md)

[![PHP from Packagist](https://img.shields.io/packagist/php-v/domain-driven-laravel/commands?style=flat-square)](https://packagist.org/packages/domain-driven-laravel/commands)
[![Total Downloads](https://img.shields.io/packagist/dt/domain-driven-laravel/commands.svg?style=flat-square)](https://packagist.org/packages/domain-driven-laravel/commands)

This packages makes it possible to use laravel artisan commands if you are using Laravel in a domain driven approach.
We will still support every flag and option possible for the command by following the Laravel documentation. Since everyone is using their own way of Domain Driven Design the defaults are set to my structure but can be easily override using the config. Please check the config section for more information.

This package is also adding a lot of custom commands just to help you to develop Laravel in Domain Driven Approach

## Installation
```bash
composer require --dev domain-driven-laravel/commands
```

## Configuration
By default, we are following the domain driven approach of my choice. But to make this package usable for everyone we encourage you to publish the config and tweak this package the way you want to use domain driven design.
```bash
sail artisan vendor:publish --tag=ddd-commands
```
[Default config](https://github.com/domain-driven-laravel/commands/blob/main/src/config/ddd-commands.php)

_Config explanation is added inside the published ddd-commands.php file_

## Commands:
If you are not using sail please replace "sail" with "php" in commands below

| Command                                    | Default output path                       | Documentation                                                              |
|--------------------------------------------|-------------------------------------------|----------------------------------------------------------------------------|
| `sail artisan make:model {domain} {name}`  | `src/Domain/{domain}/Models`              | [Laravel Documentation](https://laravel.com/docs/8.x/eloquent)             |
| `sail artisan make:job {domain} {name}`    | `src/Domain/{domain}/Jobs`                | [Laravel Documentation](https://laravel.com/docs/8.x/queues#creating-jobs) |
| `sail artisan make:action {domain} {name}` | `src/Domain/{domain}/Actions`             | (None yet)                                                                 |
| `sail artisan make:dto {domain} {name}`    | `src/Domain/{domain}/DataTransferObjects` | (None yet)                                                                 |
