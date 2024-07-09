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
     * Set the response and get the formatted JSON response.
     *
     * @return string The formatted JSON response.
     * 
     * This method sets the necessary HTTP headers for JSON response and formats the
     * response data into a JSON object. It then returns the formatted JSON response.
     */
    private function setGet(): string
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
        $status = $this->getStatus()[0]; // Extract the status code
        $result["success"] = ($status >= 200 && $status < 300);

        $message = $this->getMessage();
        if ($message !== null) {
            $result["message"] = $message; // Set 'message' field
        }

        $data = $this->getData();
        if (is_array($data)) {

            if ($data[1] == "" || $data[1] == null) {
                $result[] = $data[0]; // Set 'data' field without key
            } else {
                $result[$data[1]] = $data[0]; // Set 'data' field with key
            }
        } else {
            $result["data"] = null; // Set 'data' field with key
        }

        if (!empty($this->getStatus()[1])) {
            $result["status"] = [$status, $this->getStatus()[1]]; // Set 'status'
        } else {
            $result["status"] = $this->getHttpStatus($status); // Set 'status' using status code
        }

        // Remove keys based on hide flags
        if ($this->getHideSuccess()) {
            unset($result["success"]);
        }
        if ($this->getHideMessage()) {
            unset($result["message"]);
        }
        if ($this->getHideData()) {
            if (is_array($data)) {
                unset($result[$data[1]]);
            } else {
                unset($result["data"]);
            }
        }
        if ($this->getHideStatus()) {
            unset($result["status"]);
        }

        return json_encode($result); // Encode response data into JSON and return
    }
}
