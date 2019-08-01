<?php

namespace DI\Test\Unit;

use DI\Container;
use DI\Exception\NotFoundException;
use PHPUnit\Framework\TestCase;
use Psr\Container\NotFoundExceptionInterface;

class ContainerTest extends TestCase
{
    public function testGetInvalidKey()
    {
        $this->expectException(NotFoundExceptionInterface::class);
        $this->expectExceptionMessage('Container Invalid name not found');
        $container = new Container([]);
        $container->get('Invalid name');
    }


}
