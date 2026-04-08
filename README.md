# JSONize

[![Tests](https://github.com/alirezajavadigit/JSONize/actions/workflows/tests.yml/badge.svg)](https://github.com/alirezajavadigit/JSONize/actions/workflows/tests.yml)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-8892BF.svg)](https://php.net)

A fluent PHP library for building standardized JSON API responses.

## Requirements

- PHP 8.1 or higher

## Installation

```bash
composer require alirezajavadi/jsonize
```

## Quick Start

JSONize provides two usage modes: **Easy** (static, zero-boilerplate) and **Efficient** (singleton, memory-safe for long-running processes).

### Easy Mode

```php
use JSONize\App\Easy\Response;

Response::message("User created")->status(201)->data(["id" => 42]);
```

Output:

```json
{
    "success": true,
    "message": "User created",
    "data": {"id": 42},
    "status": [201, "Created"]
}
```

In Easy mode, the response is automatically sent when the object is destroyed. Call `->get()` instead if you need the JSON string returned without echoing:

```php
$json = Response::message("OK")->status(200)->get();
```

### Efficient Mode

```php
use JSONize\App\Efficient\Response;

$response = Response::getInstance();

$response->message("User created")->status(201)->data(["id" => 42])->get();
```

Efficient mode uses a singleton so you reuse the same instance. Always call `->get()` to retrieve the JSON string.

## API Reference

All methods are chainable and available in both modes.

### `message(string $message)`

Sets the response message.

```php
Response::message("Operation successful");
```

### `status(int $code, string $message = "")`

Sets the HTTP status code. Optionally pass a custom status message to override the default.

```php
Response::status(404);
Response::status(200, "Everything is fine");
```

### `data(mixed $data, string $key = "data")`

Sets the response payload. The second argument changes the JSON key name.

```php
Response::data(["id" => 1, "name" => "Item"]);
Response::data(["id" => 1, "name" => "Item"], "item");
```

With a custom key, the output uses that key instead of `"data"`:

```json
{
    "success": true,
    "item": {"id": 1, "name": "Item"},
    "status": [200, "OK"]
}
```

### `error(string $message, int $status = 500)`

Shorthand for setting an error message and status code in one call.

```php
Response::error("Something went wrong");
Response::error("Validation failed", 422);
```

### `headers(array $headers)`

Merges custom HTTP headers into the response. CORS headers are included by default.

```php
Response::message("OK")->headers(["X-Request-Id" => "abc-123"]);
```

### `hideStatus()` / `hideMessage()` / `hideData()` / `hideSuccess()`

Remove specific fields from the JSON output.

```php
Response::message("OK")->status(200)->hideStatus();
```

```json
{
    "success": true,
    "message": "OK",
    "data": null
}
```

### `get()`

Returns the JSON string and prevents automatic output (Easy mode). In Efficient mode, this is the only way to get the response.

```php
$json = Response::message("OK")->get();
```

## Full Examples

**Success with data:**

```php
Response::message("Users retrieved")
    ->status(200)
    ->data(["users" => [["id" => 1, "name" => "Alice"]]]);
```

```json
{
    "success": true,
    "message": "Users retrieved",
    "data": {"users": [{"id": 1, "name": "Alice"}]},
    "status": [200, "OK"]
}
```

**Validation error:**

```php
Response::error("Validation failed", 422)
    ->data(["email" => "The email field is required."], "errors");
```

```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {"email": "The email field is required."},
    "status": [422, "Unprocessable Content"]
}
```

**Minimal response:**

```php
Response::status(204)->hideMessage()->hideData();
```

```json
{
    "success": true,
    "status": [204, "No Content"]
}
```

## Supported HTTP Status Codes

All standard HTTP status codes (1xx through 5xx) are supported with their official reason phrases. Custom status messages can be provided via `->status($code, "Your message")`.

## Testing

Tests run automatically via GitHub Actions on every push to `main`/`develop` and on pull requests, across PHP 8.1 through 8.4.

To run locally:

```bash
composer install
vendor/bin/phpunit
```

## Contributing

Contributions are welcome. Please submit a pull request or open an issue for bugs and suggestions. Follow [Conventional Commits](https://www.conventionalcommits.org) for commit messages.

## License

MIT — see [LICENSE](LICENSE) for details.

## Author

[Alireza Javadi](mailto:e@alirezajawadi.ir)
