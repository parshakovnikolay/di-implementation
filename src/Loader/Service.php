<?php

namespace DI\Loader;

use DI\LoaderInterface;
use Psr\Container\ContainerInterface;

class Service implements LoaderInterface
{
    private $closure;

    public function __construct(\Closure $closure)
    {
        $this->closure = $closure;
    }

    public function __invoke(ContainerInterface $container)
    {
        return ($this->closure)($container);
    }
}
