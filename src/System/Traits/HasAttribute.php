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
| @license   MIT License
| @link      https://github.com/alirezajavadigit/JSONize
|--------------------------------------------------------------------------
| HasAttribute Trait
|--------------------------------------------------------------------------
| This trait provides methods for setting message, data, status, and headers 
| attributes to be included in the response. It encapsulates the response attributes 
| and allows for easy manipulation and customization.
|--------------------------------------------------------------------------
*/

namespace JSONize\System\Traits;

trait HasAttribute
{
    /**
     * @var string|null $message Stores the message to be included in the response.
     */
    private ?string $message = null;

    /**
     * @var string|null $statusMessage Stores the status message to be included in the response.
     */
    private ?string $statusMessage = "Ok";

    /**
     * @var string|null $dataKey Stores the key for the data payload in the response.
     */
    private ?string $dataKey = "data";

    /**
     * @var mixed|null $data Stores the data payload to be included in the response.
     */
    private $data = null;

    /**
     * @var array $status Stores the HTTP status code and message for the response.
     */
    private $status = 200;

    /**
     * @var array $headers Stores the custom headers to be included in the response.
     */
    private $headers = ["Access-Control-Allow-Origin" => "*", "Access-Control-Allow-Methods" => "GET, POST, OPTIONS", "Access-Control-Allow-Headers" => "Content-Type, Authorization", "Content-Type" => "application/json"];

    /**
     * @var bool $hideStatus Flag to hide the status in the response.
     */
    private $hideStatus = false;

    /**
     * @var bool $hideData Flag to hide the data in the response.
     */
    private $hideData = false;

    /**
     * @var bool $hideMessage Flag to hide the message in the response.
     */
    private $hideMessage = false;

    /**
     * @var bool $hideSuccess Flag to hide the success status in the response.
     */
    private $hideSuccess = false;

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
     * @return string|null The message included in the response.
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Get the data key included in the response.
     *
     * @return string|null The data key included in the response.
     */
    public function getDataKey(): ?string
    {
        return $this->dataKey;
    }

    /**
     * Set the data payload to be included in the response.
     *
     * @param mixed $data The data payload to be included in the response.
     * @param string $key The key to store the data payload under.
     * @return $this The current instance for method chaining.
     */
    public function setData(mixed $data, string $key = "data")
    {
        $this->data = $data;
        $this->dataKey = $key;
        return $this;
    }

    /**
     * Get the data payload included in the response.
     *
     * @return mixed The data payload included in the response.
     */
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * Get the status message included in the response.
     *
     * @return string|null The status message included in the response.
     */
    public function getStatusMessage(): ?string
    {
        return $this->statusMessage;
    }

    /**
     * Set the HTTP status code and message for the response.
     *
     * @param int $status The HTTP status code for the response.
     * @param string $message The HTTP status message for the response.
     * @return $this The current instance for method chaining.
     */
    public function setStatus(int $status, string $message = "")
    {
        $this->status = $status;
        $this->statusMessage = $message;
        return $this;
    }

    /**
     * Get the HTTP status code and message for the response.
     *
     * @return int The HTTP status code and message for the response.
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
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Get the value of hideStatus.
     *
     * @return bool The value of hideStatus.
     */
    public function getHideStatus(): bool
    {
        return $this->hideStatus;
    }

    /**
     * Set the value of hideStatus.
     *
     * @return $this The current instance for method chaining.
     */
    public function setHideStatus()
    {
        $this->hideStatus = true;
        return $this;
    }

    /**
     * Get the value of hideData.
     *
     * @return bool The value of hideData.
     */
    public function getHideData(): bool
    {
        return $this->hideData;
    }

    /**
     * Set the value of hideData.
     *
     * @return $this The current instance for method chaining.
     */
    public function setHideData()
    {
        $this->hideData = true;
        return $this;
    }

    /**
     * Get the value of hideMessage.
     *
     * @return bool The value of hideMessage.
     */
    public function getHideMessage(): bool
    {
        return $this->hideMessage;
    }

    /**
     * Set the value of hideMessage.
     *
     * @return $this The current instance for method chaining.
     */
    public function setHideMessage()
    {
        $this->hideMessage = true;
        return $this;
    }

    /**
     * Get the value of hideSuccess.
     *
     * @return bool The value of hideSuccess.
     */
    public function getHideSuccess(): bool
    {
        return $this->hideSuccess;
    }

    /**
     * Set the value of hideSuccess.
     *
     * @return $this The current instance for method chaining.
     */
    public function setHideSuccess()
    {
        $this->hideSuccess = true;
        return $this;
    }

    /**
     * Set the error message and status code.
     *
     * @param string $error The error message to be set.
     * @param int $status The status code to be set. Defaults to 500.
     * @return $this The current instance for method chaining.
     */
    public function setError(string $error, int $status = 500)
    {
        $this->message = $error;
        $this->status = $status;
        return $this;
    }
}
