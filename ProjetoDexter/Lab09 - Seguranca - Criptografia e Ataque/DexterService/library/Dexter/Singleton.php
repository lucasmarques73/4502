<?php

namespace Dexter;

/**
 * Trait singleton para ser utilizada
 * por todas as classes que são singleton
 */
trait Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}
