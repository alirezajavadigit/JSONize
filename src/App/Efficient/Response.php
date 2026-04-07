<?php

namespace JSONize\App\Efficient;

use JSONize\System\Traits\HasAttribute;
use JSONize\System\Traits\Efficient\MethodCaller;
use JSONize\System\Traits\Efficient\Singleton;
use JSONize\System\Traits\HasStatus;
use JSONize\System\Traits\HasStructure;

class Response
{
    use Singleton, MethodCaller, HasStatus, HasAttribute, HasStructure;

    public function get(): string
    {
        header('Content-Type: application/json');
        $this->extractHeaders();
        return $this->makeReturnableJson();
    }
}
