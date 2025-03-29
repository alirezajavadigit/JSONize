<?php

/*
|--------------------------------------------------------------------------
| JSONize Library
|--------------------------------------------------------------------------
| Standardize JSON for cleaner, consistent APIs, web, and mobile apps.
|--------------------------------------------------------------------------
| @category  Library
| @package   JSONize
| @version   1.0.0
| @author    Alireza Javadi
| @license   MIT License
| @link      https://github.com/alirezajavadigit/JSONize
|--------------------------------------------------------------------------
| Response Class
|--------------------------------------------------------------------------
| This class handles the response formatting and ensures consistency in JSON output.
| Utilizes Singleton and MethodCaller traits.
|--------------------------------------------------------------------------
*/

namespace JSONize\App\Easy;

use JSONize\System\Traits\HasAttribute;
use JSONize\System\Traits\Easy\MethodCaller;
use JSONize\System\Traits\HasStatus;
use JSONize\System\Traits\HasStructure;

class Response
{
    use MethodCaller, HasStatus, HasAttribute, HasStructure;
    private $isGeted = false;
    public function get()
    {
        $this->isGeted = true;
        header('Content-Type: application/json'); // Set content type header to JSON
        $this->extractHeaders(); // Extract and set custom headers
        return $this->makeReturnableJson(); // Format response data into JSON and return
    }
    public function __destruct()
    {
        if (!$this->isGeted) {
            header('Content-Type: application/json'); // Set content type header to JSON
            $this->extractHeaders(); // Extract and set custom headers
            echo $this->makeReturnableJson(); // Format response data into JSON and return
            exit;
        }
    }
}
