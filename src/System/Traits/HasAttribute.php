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
| HasAttribute Trait
|--------------------------------------------------------------------------
| This trait provides methods for setting message, data, status, and headers attributes 
| to be included in the response. It encapsulates the response attributes and 
| allows for easy manipulation and customization.
|--------------------------------------------------------------------------
*/

namespace JSONize\System\Traits;

trait HasAttribute
{
    /**
     * @var string|null $message Stores the message to be included in the response.
     */
    private string $message;

    /**
     * @var mixed|null $data Stores the data payload to be included in the response.
     */
    private $data = null;

    /**
     * @var int $status Stores the HTTP status code for the response.
     */
    private $status = 200;

    /**
     * @var array $headers Stores the custom headerss to be included in the response.
     */
    private $headers = [];

    /**
     * Set the message to be included in the response.
     *
     * @param string $message The message to be included in the response.
     * @return $this The current instance for method chaining.
     */
    public function setMessage(string $message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the message included in the response.
     *
     * @return string The message included in the response.
     */
    public function getMessage()
    {
        return isset($this->message) ? $this->message : null;
    }

    /**
     * Set the data payload to be included in the response.
     *
     * @param mixed $data The data payload to be included in the response.
     * @return $this The current instance for method chaining.
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the data payload included in the response.
     *
     * @return mixed The data payload included in the response.
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the HTTP status code for the response.
     *
     * @param int $status The HTTP status code for the response.
     * @return $this The current instance for method chaining.
     */
    public function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the HTTP status code for the response.
     *
     * @return int The HTTP status code for the response.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the custom headers to be included in the response.
     *
     * @param array $headers The custom headers to be included in the response.
     * @return $this The current instance for method chaining.
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Get the custom headers included in the response.
     *
     * @return array The custom headers included in the response.
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
