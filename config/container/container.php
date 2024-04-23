<?php declare(strict_types=1);

use App\Domain\Genral\Interfaces\IConnectionFactory;
use App\Domain\Genral\Models\Connection;

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
            "mysql:host=mysql;port=3306;dbname=jeeves",
            "root",
            "secret"
        )
    );
