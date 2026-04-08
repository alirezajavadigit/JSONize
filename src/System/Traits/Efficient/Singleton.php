<?php

namespace JSONize\System\Traits\Efficient;

trait Singleton
{
    private static ?self $instance = null;

    private function __construct() {}

    private function __clone() {}

    public function __wakeup()
    {
        throw new \RuntimeException("Cannot unserialize a singleton.");
    }

    public static function getInstance(): static
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public static function resetInstance(): void
    {
        static::$instance = null;
    }
}
