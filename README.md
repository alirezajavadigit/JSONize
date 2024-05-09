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

```php
<?php
//init
use JSONize\App\Response;

$response = Response::getInstance();
//

// Examples:

// 1. Success Example
$response->message("Deleted SuccessFully")->end();
/*
result
    {
        "success": true,
        "message": "Deleted SuccessFully",
        "data": null,
        "status": [
            200,
            "ok"
        ]
    }
*/

// 2. Error Example
$response->message("User Not Found")->status(404)->end();
/*
result
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

// 3. Other Example
$response->status(204)->end();
/*
result
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
/*
note the end() is important to use;
*/
```

### Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue if you encounter any problems or have suggestions for improvements.

### License

JSONize is open-source software licensed under the MIT license.

### Author

This library is created and maintained by Alireza Javadi. You can reach out to me at e@alirezajawadi.ir.
