<?php

declare(strict_types=1);

namespace App\Domain\Genral\Interfaces;

use PDO;
use App\Domain\Genral\Models\Connection;

interface IConnectionFactory
{
    public function create(): PDO;
}
