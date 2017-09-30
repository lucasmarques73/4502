<?php

namespace DexterService\Models\Collection;

class AbstractCollection extends \ArrayObject
{
    public function toArray()
    {
        $return = array();
        foreach ($this as $value) {
            $return[] = $value->toArray();
        }

        return $return;
    }
}
