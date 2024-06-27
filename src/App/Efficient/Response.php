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

namespace JSONize\App\Efficient; //Namespace declaration for the JSONize\App package

use JSONize\System\Traits\HasAttribute;
use JSONize\System\Traits\Efficient\MethodCaller;
use JSONize\System\Traits\Efficient\Singleton;
use JSONize\System\Traits\HasStatus;
use JSONize\System\Traits\HasStructure; // Importing the HasStructure trait from the JSONize\System\Traits namespace

class Response
{
    use Singleton, MethodCaller, HasStatus, HasAttribute, HasStructure;
}
