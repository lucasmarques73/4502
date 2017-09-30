<?php

namespace DexterService\Models;

trait TestProvider
{
    public function providerForInt()
    {
        return array(
            array(1),
            array(100000),
            array(500),
            array(234456)
        );
    }

    public function providerForString()
    {
        return array(
            array('string'),
            array('olá'),
            array('Hello World!')
        );
    }

    public function providerForImagens()
    {
        return array(
            array('imagem.png'),
            array('imagem.jpg'),
            array('imagem.jpeg'),
            array('imagem.gif')
        );
    }

    public function providerForBigString50()
    {
        return array(
            array(str_repeat('a', 51)),
            array(str_repeat('b', 120)),
            array(str_repeat('c', 200)),
            array(str_repeat('d', 100))
        );
    }

    public function providerYN()
    {
        return array(
            array('Y', true),
            array('N', false)
        );
    }

    public function providerForTelefone()
    {
        return array(
            array('(11) 4444-5555'),
            array('(19) 2444-5555'),
            array('(17) 3444-5555'),
        );
    }

    public function providerForCelular()
    {
        return array(
            array('(11) 94444-5555'),
            array('(11) 92444-5555'),
            array('(17) 9444-5555'),
        );
    }

    public function providerForEmail()
    {
        return array(
            array('teste@teste.com.br'),
            array('teste1@teste.br'),
            array('teste2@teste.org'),
            array('teste3@teste.com'),
        );
    }

    public function providerForCep()
    {
        return array(
            array('09191-000'),
            array('01291-000'),
            array('07791-123')
        );
    }

    public function providerForEstado()
    {
        return array(
            array('SP'),
            array('AL'),
            array('TO')
        );
    }
}
