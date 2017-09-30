<?php

namespace Dexter\Auth;

interface Auth
{
    public function login($controller, $action);
}
