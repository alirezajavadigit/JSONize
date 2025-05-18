<?php

/*
|--------------------------------------------------------------------------
| JSONize Library
|--------------------------------------------------------------------------
| Standardize JSON for cleaner, consistent APIs, web, and mobile apps.
|--------------------------------------------------------------------------
| @category  Library
| @package   JSONize
| @version   1.8.1
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

namespace JSONize\App\Efficient;

use JSONize\System\Traits\HasAttribute;
use JSONize\System\Traits\Efficient\MethodCaller;
use JSONize\System\Traits\Efficient\Singleton;
use JSONize\System\Traits\HasStatus;
use JSONize\System\Traits\HasStructure;

class Response
{
    use Singleton, MethodCaller, HasStatus, HasAttribute, HasStructure;
}
