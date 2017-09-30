<?php

namespace Dexter\Auth;

interface Algo
{
    public function login($user, $password);
}
