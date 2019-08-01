--TEST--
Набор параметров ключ значение
--FILE--
<?php

use DI\Container;
use DI\Test\DB;
use DI\Loader\Service;

require __DIR__ . '/../../vendor/autoload.php';

$container = new Container([
    'dbname' => 'test',
    'host' => 'localhost',
    'username' => 'stalker',
    'password' => 'stalker123',
    'type' => 'mysql',
    'dsn' => new Service(function (Container $container) {
        return "{$container->get('type')}:dbname={$container->get('dbname')};host={$container->get('host')}";
    }),
    DB::class => new Service(function (Container $container) {
        return new DB(
            $container->get('dsn'),
            $container->get('username'),
            $container->get('password')
         );
    })
]);

$db = $container->get(DB::class);
echo $db->dsn;
?>
--EXPECT--
mysql:dbname=test;host=localhost
