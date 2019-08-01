--TEST--
Reference dependencies
--FILE--
<?php

use DI\Container;
use DI\Loader\Alias;

require __DIR__ . '/../../vendor/autoload.php';

$container = new Container([
    'a' => 'a class',
    'b' => 'b',
    'i' => new Alias('a')
]);

echo $container->get('i');
?>
--EXPECT--
a class
