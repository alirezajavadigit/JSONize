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
| HasStructure Trait
|--------------------------------------------------------------------------
| This trait provides methods for structuring the response data and setting HTTP headers.
| It encapsulates the structure of the JSON response and allows for easy formatting and customization.
|--------------------------------------------------------------------------
*/

namespace JSONize\System\Traits;

trait HasStructure
{
    /**
     * Set the end of the response.
     *
     * @return string The formatted JSON response.
     * 
     * This method sets the necessary HTTP headers for JSON response and formats the
     * response data into a JSON object. It then returns the formatted JSON response.
     */
    private function setEnd(): string
    {
        header('Content-Type: application/json'); // Set content type header to JSON
        $this->extractHeaders(); // Extract and set custom headers
        return $this->makeReturnableJson(); // Format response data into JSON and return
    }

    /**
     * Extract and set custom HTTP headers.
     *
     * This method iterates over the headers array and sets each key-value pair as an HTTP header.
     */
    private function extractHeaders(): void
    {
        foreach ($this->headers as $key => $value) {
            header("$key: $value"); // Set each key-value pair as an HTTP header
        }
    }

    /**
     * Format response data into JSON.
     *
     * @return string The formatted JSON response.
     * 
     * This method formats the response data into a JSON object with 'success', 'message',
     * and 'data' fields. It determines the 'success' field based on the HTTP status code.
     * Then, it encodes the JSON object and returns the formatted JSON response.
     */
    private function makeReturnableJson(): string
    {
        $result = []; // Initialize empty array to store response data
        // Determine 'success' field based on HTTP status code
        $result["success"] = (int)$this->getStatus() >= 200 && (int)$this->getStatus() <= 300 ? true : false;
        $result["message"] = $this->getMessage(); // Set 'message' field
        $result["data"] = $this->getData(); // Set 'data' field
        $result["status"] = $this->getHttpStatus(); // Set 'data' field
        return json_encode($result); // Encode response data into JSON and return
    }

    private function getHttpStatus()
    {
        switch ($this->getStatus()) {
            case 200:
                return [200, "ok"];
                break;
            case 404:
                return [404, "Not Found"];
                break;
            case 204:
                return [204, "No Content"];
                break;
        }
    }
}
