<?php

namespace JSONize\App\Easy;

use JSONize\System\Traits\HasAttribute;
use JSONize\System\Traits\Easy\MethodCaller;
use JSONize\System\Traits\HasStatus;
use JSONize\System\Traits\HasStructure;

class Response
{
    use MethodCaller, HasStatus, HasAttribute, HasStructure;

    private bool $returned = false;

    public function get(): string
    {
        $this->returned = true;
        header('Content-Type: application/json');
        $this->extractHeaders();
        return $this->makeReturnableJson();
    }

    public function __destruct()
    {
        if ($this->returned) {
            return;
        }

        header('Content-Type: application/json');
        $this->extractHeaders();
        echo $this->makeReturnableJson();
    }
}
