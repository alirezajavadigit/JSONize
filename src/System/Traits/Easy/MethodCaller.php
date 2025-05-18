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
| MethodCaller Trait
|--------------------------------------------------------------------------
| This trait provides dynamic method calling functionality for classes.
| It allows calling instance and static methods dynamically.
|--------------------------------------------------------------------------
*/

namespace JSONize\System\Traits\Easy;

trait MethodCaller
{
    /**
     * Magic method to call instance methods dynamically.
     *
     * @param string $method The method name to call.
     * @param array $args An array of arguments to pass to the method.
     * @return mixed The result of the method call.
     */
    public function __call(string $method, array $args): mixed
    {
        return $this->methodCaller($this, $method, $args);
    }

    /**
     * Magic method to call static methods dynamically.
     *
     * @param string $method The method name to call.
     * @param array $args An array of arguments to pass to the method.
     * @return mixed The result of the method call.
     */
    public static function __callStatic(string $method, array $args): mixed
    {
        $className = get_called_class();
        $instance = new $className;
        return $instance->methodCaller($instance, $method, $args);
    }

    /**
     * Calls a method dynamically.
     *
     * @param object $object The object to call the method on.
     * @param string $method The method name to call.
     * @param array $args An array of arguments to pass to the method.
     * @return mixed The result of the method call.
     */
    private function methodCaller($object, string $method, array $args): mixed
    {
        $suffix = 'set'; // Suffix for constructing method name
        $methodName = $suffix . strtoupper($method[0]) . substr($method, 1); // Constructing method name
        // Call the method on the object with provided arguments.
        return call_user_func_array(array($object, $methodName), $args);
    }
}
