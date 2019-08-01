<?php

namespace DI;

use DI\Exception\NotFoundException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function get($id)
    {
        if (!$this->has($id)) {
            throw new NotFoundException($id);
        }
        $result = $this->values[$id];
        if ($result instanceof LoaderInterface) {
            $result = $result($this);
        }
        return $result;
    }

    public function has($id)
    {
        return array_key_exists($id, $this->values);
    }
}
