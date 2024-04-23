<?php declare(strict_types=1);

namespace Test\Domain\Genral\Models;

use PHPUnit\Framework\TestCase;
use App\Domain\Genral\Models\Connection;
use PHPUnit\Framework\Attributes\CoversClass;


#[CoversClass(Connection::class)]
class ConnectionModelTest extends TestCase 
{
    public function testConnectionModel(): void
    {
        $username = "username";
        $dsn = "test-dsn";
        $password = "password";

        $connection = new Connection(
            $dsn, 
            $username, 
            $password
        );

        $this->assertEquals($dsn, $connection->getDsn());
        $this->assertEquals($password, $connection->getPassword());
        $this->assertEquals($username, $connection->getUsername());
    }
}