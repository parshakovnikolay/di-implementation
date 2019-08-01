<?php

namespace DI\Loader;

use DI\LoaderInterface;
use Psr\Container\ContainerInterface;

class Alias implements LoaderInterface
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __invoke(ContainerInterface $container)
    {
        return $container->get($this->name);
    }
}
