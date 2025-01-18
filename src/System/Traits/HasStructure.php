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
        $statusCode = $this->getStatus(); // Extract the status code
        $result["success"] = ($statusCode >= 200 && $statusCode < 300);

        $message = $this->getMessage();
        if ($message !== null) {
            $result["message"] = $message; // Set 'message' field if available
        }

        $data = $this->getData();
        $dataKey = $this->getDataKey();
        if (is_array($data)) {
            if ($dataKey == "" || $dataKey == null) {
                $result[] = $data; // Set 'data' field without a specific key
            } else {
                $result[$dataKey] = $data; // Set 'data' field with a specified key
            }
        } else {
            $result[$dataKey] = $data; // Set 'data' field for non-array data
        }

        // Check and set the 'status' field if there's a custom status message
        if (!empty($this->getStatusMessage())) {
            $result["status"] = [$statusCode, $this->getStatusMessage()]; // Set 'status' with status code and message
        } else {
            $result["status"] = $this->getHttpStatus($statusCode); // Set 'status' based on status code
        }

        // Conditional removal of keys based on user-defined hide flags
        if ($this->getHideSuccess()) {
            unset($result["success"]); // Remove 'success' if hide flag is set
        }
        if ($this->getHideMessage()) {
            unset($result["message"]); // Remove 'message' if hide flag is set
        }
        if ($this->getHideData()) {
            if (is_array($data)) {
                unset($result[$dataKey]); // Remove 'data' if it's an array and hide flag is set
            } else {
                unset($result["data"]); // Remove 'data' if hide flag is set for non-array
            }
        }
        if ($this->getHideStatus()) {
            unset($result["status"]); // Remove 'status' if hide flag is set
        }

        http_response_code($statusCode); // Set HTTP response code based on status

        return json_encode($result); // Encode response data into JSON format and return
    }
}
