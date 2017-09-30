<?php

namespace DexterService\Models\Strategy;

/**
 * Interface para todas as estratégias de login
 */
interface LoginStrategy
{

    /**
     * @var string $user Usuário
     * @var string $pass Senha
     * @throws DexterService\Models\Exceptions\InvalidUserOrPasswordException
     */
    public function login($user, $pass);
}
