<?php

namespace JSONize\System\Traits\Easy;

trait MethodCaller
{
    public function __call(string $method, array $args): mixed
    {
        return $this->methodCaller($this, $method, $args);
    }

    public static function __callStatic(string $method, array $args): mixed
    {
        $instance = new static();
        return $instance->methodCaller($instance, $method, $args);
    }

    private function methodCaller(object $object, string $method, array $args): mixed
    {
        $methodName = 'set' . ucfirst($method);
        return call_user_func_array([$object, $methodName], $args);
    }
}
