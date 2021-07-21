<?php

namespace Tests\Concerns;

trait HasRandomValues
{
    /**
     * @param string $className
     *
     * @return array|int|string
     */
    protected function random(string $className)
    {
        return array_rand(array_flip($className::toArray()));
    }
}
