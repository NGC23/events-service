<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use App\Domain\Genral\Interfaces\IConnectionFactory;
use App\Domain\Genral\Models\Connection;

$dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

$container = new League\Container\Container();

$container->add(App\Application\Events\EventController::class)
    ->addArgument(App\Domain\Events\Interfaces\IEventRepository::class);

$container->add(
    App\Domain\Events\Interfaces\IEventRepository::class,
    App\Infrastructure\Events\Repository\EventRepository::class
)->addArgument(App\Domain\Genral\Interfaces\IConnectionFactory::class);

$container->add(
    App\Domain\Genral\Interfaces\IConnectionFactory::class,
    App\Domain\Genral\Factories\PDOConnectionFactory::class
)->addArgument(
        new Connection(
            "mysql:host={$_ENV['MYSQL_ROOT_HOST']};port={$_ENV['MYSQL_ROOT_PORT']};dbname={$_ENV['MYSQL_ROOT_DATABASE']}",
            $_ENV['MYSQL_ROOT_USER'],
            $_ENV['MYSQL_ROOT_PASSWORD']
        )
    );
