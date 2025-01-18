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
        // Informational responses (100–199)
        switch ($status) {
            case 100:
                return [100, "Continue"];
            case 101:
                return [101, "Switching Protocols"];
            case 102:
                return [102, "Processing"];
            case 103:
                return [103, "Early Hints"];
            case 110:
                return [110, "Response is Stale"];
            case 111:
                return [111, "Revalidation Failed"];
            case 112:
                return [112, "Disconnected Operation"];
            case 113:
                return [113, "Heuristic Expiration"];
            case 199:
                return [199, "Miscellaneous Warning"];

                // Successful responses (200–299)
            case 200:
                return [200, "OK"];
            case 201:
                return [201, "Created"];
            case 202:
                return [202, "Accepted"];
            case 203:
                return [203, "Non-Authoritative Information"];
            case 204:
                return [204, "No Content"];
            case 205:
                return [205, "Reset Content"];
            case 206:
                return [206, "Partial Content"];
            case 207:
                return [207, "Multi-Status"];
            case 208:
                return [208, "Already Reported"];
            case 214:
                return [214, "Transformation Applied"];
            case 218:
                return [218, "This is fine (Apache Web Server)"];
            case 226:
                return [226, "IM Used"];
            case 299:
                return [299, "Miscellaneous Persistent Warning"];

                // Redirection messages (300–399)
            case 300:
                return [300, "Multiple Choices"];
            case 301:
                return [301, "Moved Permanently"];
            case 302:
                return [302, 'Found'];
            case 303:
                return [303, "See Other"];
            case 304:
                return [304, "Not Modified"];
            case 305:
                return [305, "Use Proxy"];
            case 306:
                return [306, "Switch Proxy"];
            case 307:
                return [307, "Temporary Redirect"];
            case 308:
                return [308, "Permanent Redirect"];

                // Client error responses (400–499)
            case 400:
                return [400, "Bad Request"];
            case 401:
                return [401, "Unauthorized"];
            case 402:
                return [402, "Payment Required"];
            case 403:
                return [403, "Forbidden"];
            case 404:
                return [404, "Not Found"];
            case 405:
                return [405, "Method Not Allowed"];
            case 406:
                return [406, "Not Acceptable"];
            case 407:
                return [407, "Proxy Authentication Required"];
            case 408:
                return [408, "Request Timeout"];
            case 409:
                return [409, "Conflict"];
            case 410:
                return [410, "Gone"];
            case 411:
                return [411, "Length Required"];
            case 412:
                return [412, "Precondition Failed"];
            case 413:
                return [413, "Payload Too Large"];
            case 414:
                return [414, "URI Too Long"];
            case 415:
                return [415, "Unsupported Media Type"];
            case 416:
                return [416, "Range Not Satisfiable"];
            case 417:
                return [417, "Expectation Failed"];
            case 418:
                return [418, "I'm a teapot"];
            case 419:
                return [419, "Page Expired (Laravel Framework)"];
            case 420:
                return [420, "Method Failure (Spring Framework)"];
            case 421:
                return [421, "Misdirected Request"];
            case 422:
                return [422, "Unprocessable Entity"];
            case 423:
                return [423, "Locked"];
            case 424:
                return [424, "Failed Dependency"];
            case 425:
                return [425, "Too Early"];
            case 426:
                return [426, "Upgrade Required"];
            case 428:
                return [428, "Precondition Required"];
            case 429:
                return [429, "Too Many Requests"];
            case 430:
                return [430, "Request Header Fields Too Large (Shopify)"];
            case 431:
                return [431, "Request Header Fields Too Large"];
            case 444:
                return [444, "No Response (Nginx)"];
            case 450:
                return [450, "Blocked by Windows Parental Controls (Microsoft)"];
            case 451:
                return [451, "Unavailable For Legal Reasons"];
            case 494:
                return [494, "Request Header Too Large (Nginx)"];
            case 495:
                return [495, "SSL Certificate Error (Nginx)"];
            case 496:
                return [496, "SSL Certificate Required (Nginx)"];
            case 497:
                return [497, "HTTP Request Sent to HTTPS Port (Nginx)"];
            case 498:
                return [498, "Invalid Token (Esri)"];
            case 499:
                return [499, "Client Closed Request (Nginx)"];

                // Server error responses (500–599)
            case 500:
                return [500, "Internal Server Error"];
            case 501:
                return [501, "Not Implemented"];
            case 502:
                return [502, "Bad Gateway"];
            case 503:
                return [503, "Service Unavailable"];
            case 504:
                return [504, "Gateway Timeout"];
            case 505:
                return [505, "HTTP Version Not Supported"];
            case 506:
                return [506, "Variant Also Negotiates"];
            case 507:
                return [507, "Insufficient Storage"];
            case 508:
                return [508, "Loop Detected"];
            case 509:
                return [509, "Bandwidth Limit Exceeded (Apache Web Server)"];
            case 510:
                return [510, "Not Extended"];
            case 511:
                return [511, "Network Authentication Required"];
            case 520:
                return [520, "Web Server Returned an Unknown Error (Cloudflare)"];
            case 521:
                return [521, "Web Server Is Down (Cloudflare)"];
            case 522:
                return [522, "Connection Timed Out (Cloudflare)"];
            case 523:
                return [523, "Origin Is Unreachable (Cloudflare)"];
            case 524:
                return [524, "A Timeout Occurred (Cloudflare)"];
            case 525:
                return [525, "SSL Handshake Failed (Cloudflare)"];
            case 526:
                return [526, "Invalid SSL Certificate (Cloudflare)"];
            case 527:
                return [527, "Railgun Error (Cloudflare)"];
            case 529:
                return [529, "Site is overloaded"];
            case 530:
                return [530, "Site is frozen"];
            case 598:
                return [598, "Network read timeout error"];
            case 599:
                return [599, "Network connect timeout error"];

                // Custom status codes
            case 701:
                return [701, "Meh (Drupal)"];
            case 702:
                return [702, "Emacs (Drupal)"];
            case 703:
                return [703, "Explosion (Drupal)"];
            case 704:
                return [704, "Goto fail (Drupal)"];
            case 705:
                return [705, "I wrote the code and missed the necessary validation by an oversight (Drupal)"];
            case 706:
                return [706, "Enhance Your Calm (Drupal)"];
            case 710:
                return [710, "PHP Out of Memory (Drupal)"];
            case 711:
                return [711, "PHP Timeout (Drupal)"];
            case 712:
                return [712, "PHP Fatal Error (Drupal)"];
            case 720:
                return [720, "WTF (Drupal)"];
            case 721:
                return [721, "DNS Issues (Drupal)"];
            case 722:
                return [722, "Too Many Included Files (Drupal)"];
            case 723:
                return [723, "MySQL Connection Failed (Drupal)"];
            case 724:
                return [724, "MySQL Too Many Connections (Drupal)"];
            case 725:
                return [725, "PDO Exception (Drupal)"];
            case 726:
                return [726, "Random Bullshit (Drupal)"];
            case 727:
                return [727, "MySQL Syntax Error (Drupal)"];
            case 780:
                return [780, "GSM 7-bit text encoding error (Custom)"];
            case 781:
                return [781, "GSM 8-bit text encoding error (Custom)"];
            case 782:
                return [782, "GSM UCS2 text encoding error (Custom)"];
            case 783:
                return [783, "GSM 7-bit and 8-bit text encoding error (Custom)"];

                // Default case for unspecified status codes
            default:
                return [500, "Internal Server Error"];
        }
    }
}
