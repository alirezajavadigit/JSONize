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
| Singleton Trait
|--------------------------------------------------------------------------
| This trait provides functionality for creating singleton instances of classes.
| It ensures that only one instance of the class is created throughout the application's lifecycle.
|--------------------------------------------------------------------------
*/

namespace JSONize\System\Traits\Efficient;

trait Singleton
{
    /**
     * The singleton instance of the class.
     *
     * @var self|null The singleton instance of the class.
     */
    private static $instance = null;

    /**
     * Constructor method is private to prevent direct instantiation of the class.
     * 
     * This constructor method is made private to prevent external instantiation 
     * of the class. It ensures that the class can only be instantiated from 
     * within itself, which is essential for implementing the Singleton pattern.
     */
    private function __construct()
    {
    }

    /**
     * Get the singleton instance of the class.
     *
     * @return self The singleton instance of the class.
     * 
     * This method returns the singleton instance of the class. If the instance 
     * does not exist, it creates a new one and assigns it to the static 
     * property $instance. This ensures that only one instance of the class is 
     * created throughout the application's lifecycle.
     */
    public static function getInstance(): self
    {
        // If the instance does not exist, create a new one and assign it to $instance.
        return self::$instance ? self::$instance : self::$instance = new self();
    }
}
