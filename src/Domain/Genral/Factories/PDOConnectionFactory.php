<?php

declare(strict_types=1);

namespace App\Domain\Genral\Factories;

use App\Domain\Genral\Interfaces\IConnectionFactory;
use App\Domain\Genral\Models\Connection;
use PDO;
use PDOException;

class PDOConnectionFactory implements IConnectionFactory
{
    //"mysql:host=mysql;port=3306;dbname=jeeves","root","secret"
    public function __construct(private Connection $connection)
    {
    }

    public function create(): PDO
    {
        try {
            return (
                new PDO(
                    $this->connection->getDsn(),
                    $this->connection->getUsername(),
                    $this->connection->getPassword()
                )
            );
        } catch (PDOException $e) {
            throw $e;
            //log and do something
        }
    }
}
