<?php

namespace App\ValueObjects;

abstract class AbstractObject
{
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = $this->parseKeyToMethod($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    protected function parseKeyToMethod(string $key)
    {
        return camel_case('set_' . $key);
    }
}
