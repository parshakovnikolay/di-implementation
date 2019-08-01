<?php

namespace DI;

use Psr\Container\ContainerInterface;

interface LoaderInterface
{
    public function __invoke(ContainerInterface $container);
}
