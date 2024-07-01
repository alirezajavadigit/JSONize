# JSONize

### JSONize: Standardize JSON responses effortlessly!

Ensure consistency in your applications with our streamlined library. Simplify data formatting, enhance readability, and save time. JSONize empowers developers to generate clean, organized JSON outputs, perfect for APIs, web, and mobile apps. Revolutionize your workflow today!

### Installation

You can install JSONize via Composer:

```bash
composer require alirezajavadi/jsonize
```

### Usage

Once JSONize is installed, you can start using it in your projects. Here's a basic example of how to use JSONize:

# New Features in v1.5.1

#### Easy Syntax

For a more straightforward syntax, use:

```php
<?php

use JSONize\App\Easy\Response;

// Example 1: Success
Response::message("Deleted Successfully");
/*
{
    "success": true,
    "message": "Deleted Successfully",
    "data": null,
    "status": [
        200,
        "ok"
    ]
}
*/

// Example 2: Error
Response::message("User Not Found")->status(404);
/*
{
    "success": false,
    "message": "User Not Found",
    "data": null,
    "status": [
        404,
        "Not Found"
    ]
}
*/

// Example 3: No Content
Response::status(204);
/*
{
    "success": true,
    "message": null,
    "data": null,
    "status": [
        204,
        "No Content"
    ]
}
*/

// Example 4: Data with Custom Key
Response::data(["id" => 1, "name" => "Item"], "item");
/*
{
    "success": true,
    "message": null,
    "item": {
        "id": 1,
        "name": "Item"
    },
    "status": [
        200,
        "ok"
    ]
}
*/

// Example 5: Data with Custom Key and Hide Status
Response::data(["id" => 1, "name" => "Item"], "item")->hideStatus();
/*
{
    "success": true,
    "message": null,
    "item": {
        "id": 1,
        "name": "Item"
    }
}
*/

// Example 6: Data with Custom Key and Custom Status Message
Response::data(["id" => 1, "name" => "Item"], "item")->status(142, "example info")->hideMessage();
/*
{
    "success": true,
    "item": {
        "id": 1,
        "name": "Item"
    },
    "status": [
        142,
        "example info"
    ]
}
*/

// Example 7: Data with Metadata
Response::data(["id" => 1, "name" => "Item"])
         ->message("Item retrieved successfully")
         ->status(200);
/*
{
    "success": true,
    "message": "Item retrieved successfully",
    "data": {
        "id": 1,
        "name": "Item"
    },
    "status": [
        200,
        "ok"
    ]
}
*/
```

#### Efficient Memory Usage

For efficient usage and memory safety, use:

```php
<?php
// Init
use JSONize\App\Efficient\Response;

$response = Response::getInstance();

// Example 1: Success
$response->message("Deleted Successfully")->get();
/*
{
    "success": true,
    "message": "Deleted Successfully",
    "data": null,
    "status": [
        200,
        "ok"
    ]
}
*/

// Example 2: Error
$response->message("User Not Found")->status(404)->get();
/*
{
    "success": false,
    "message": "User Not Found",
    "data": null,
    "status": [
        404,
        "Not Found"
    ]
}
*/

// Example 3: No Content
$response->status(204)->get();
/*
{
    "success": true,
    "message": null,
    "data": null,
    "status": [
        204,
        "No Content"
    ]
}
*/

// Example 4: Data with Custom Key
$response->data(["id" => 1, "name" => "Item"], "item")->get();
/*
{
    "success": true,
    "message": null,
    "item": {
        "id": 1,
        "name": "Item"
    },
    "status": [
        200,
        "ok"
    ]
}
*/

// Example 5: Data with Custom Key And Hide Status
$response->data(["id" => 1, "name" => "Item"], "item")->hideStatus()->get();
/*
{
    "success": true,
    "message": null,
    "item": {
        "id": 1,
        "name": "Item"
    },
}
*/

// Example 6: Data with Custom Key And Custom Status Message
$response->data(["id" => 1, "name" => "Item"], "item")->status(142, "example info")->get();
/*
{
    "success": true,
    "message": null,
    "item": {
        "id": 1,
        "name": "Item"
    },
    "status": [
        142,
        "example info"
    ]
}
*/

// Example 7: Data with Metadata
$response->data(["id" => 1, "name" => "Item"])
         ->message("Item retrieved successfully")
         ->status(200)
         ->get();
/*
{
    "success": true,
    "message": "Item retrieved successfully",
    "data": {
        "id": 1,
        "name": "Item"
    },
    "status": [
        200,
        "ok"
    ]
}
*/

// Note: `get()` is important to use.

```

### Contributing

Contributions are welcome! Everyone who wants to contribute can add new HTTP status codes to this file: System/Traits/HasStatus.php. Submit a pull request or open an issue for any problems or suggestions.

### License

JSONize is open-source software licensed under the MIT license.

### Author

This library is created and maintained by Alireza Javadi. You can reach out to me at e@alirezajawadi.ir.
