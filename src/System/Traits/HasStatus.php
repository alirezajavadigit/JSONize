<?php

/*
|--------------------------------------------------------------------------
| JSONize Library
|--------------------------------------------------------------------------
| Standardize JSON for cleaner, consistent APIs, web, and mobile apps.
|--------------------------------------------------------------------------
| @category  Library
| @author    Alireza Javadi
| @license   MIT License
| @link      https://github.com/alirezajavadigit/JSONize
|--------------------------------------------------------------------------
| HasStatus Trait
|--------------------------------------------------------------------------
| This trait provides methods for structuring the response data and setting HTTP headers.
| It encapsulates the structure of the JSON response and allows for easy formatting and customization.
|--------------------------------------------------------------------------
*/

namespace JSONize\System\Traits;

trait HasStatus
{
    /**
     * Retrieves the HTTP status code and corresponding message.
     *
     * Uses internal status code to determine HTTP status and message.
     * Handles various status codes using a switch statement.
     *
     * @return array An array containing the HTTP status code and message.
     */
    private function getHttpStatus($status)
    {
        // Switch statement to handle different internal status codes.
        switch ($status) {
            case 100:
                return [100, "Continue"]; // Returns status code 100 and message.
                break;
            case 101:
                return [101, "Switching Protocols"]; // Returns status code 101 and message.
                break;
            case 102:
                return [102, "Processing"]; // Returns status code 102 and message.
                break;
            case 103:
                return [103, "Early Hints"]; // Returns status code 103 and message.
                break;
            case 200:
                return [200, "OK"]; // Returns status code 200 and message.
                break;
            case 201:
                return [201, "Created"]; // Returns status code 201 and message.
                break;
            case 202:
                return [202, "Accepted"]; // Returns status code 202 and message.
                break;
            case 203:
                return [203, "Non-Authoritative Information"]; // Returns status code 203 and message.
                break;
            case 204:
                return [204, "No Content"]; // Returns status code 204 and message.
                break;
            case 205:
                return [205, "Reset Content"]; // Returns status code 205 and message.
                break;
            case 206:
                return [206, "Partial Content"]; // Returns status code 206 and message.
                break;
            case 207:
                return [207, "Multi-Status"]; // Returns status code 207 and message.
                break;
            case 208:
                return [208, "Already Reported"]; // Returns status code 208 and message.
                break;
            case 226:
                return [226, "IM Used"]; // Returns status code 226 and message.
                break;
            case 300:
                return [300, "Multiple Choices"];
                break;
            case 301:
                return [301, "Moved Permanently"];
                break;
            case 302:
                return [302, 'Found (Previously "Moved temporarily")'];
                break;
            case 303:
                return [303, "See Other (since HTTP/1.1)"];
                break;
            case 304:
                return [304, "Not Modified"];
                break;
            case 305:
                return [305, "Use Proxy (since HTTP/1.1)"];
                break;
            case 306:
                return [306, "Switch Proxy"];
                break;
            case 307:
                return [307, "Temporary Redirect (since HTTP/1.1)"];
                break;
            case 308:
                return [308, "Permanent Redirect"];
                break;
            case 404:
                return [404, "Not Found"]; // Returns status code 404 and message.
                break;
        }
    }
}
