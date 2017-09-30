<?php

namespace Dexter\Log\Adapters;

interface Adapter
{
    public function write($data);
}
