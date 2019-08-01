<?php

namespace DI\Exception;

use Psr\Container\NotFoundExceptionInterface;

class NotFoundException extends \InvalidArgumentException implements NotFoundExceptionInterface
{
    public function __construct(string $name)
    {
        parent::__construct("Container $name not found");
    }
}
