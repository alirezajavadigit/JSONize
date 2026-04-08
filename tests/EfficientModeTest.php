<?php

namespace JSONize\Tests;

use PHPUnit\Framework\TestCase;
use JSONize\App\Efficient\Response;

class EfficientModeTest extends TestCase
{
    protected function setUp(): void
    {
        Response::resetInstance();
    }

    public function testSuccess(): void
    {
        $response = Response::getInstance();

        $expected = json_encode([
            "success" => true,
            "message" => "success",
            "data" => null,
            "status" => [200, "OK"],
        ]);

        $actual = $response->message("success")->status(200)->get();

        $this->assertSame($expected, $actual);
    }

    public function testError(): void
    {
        $response = Response::getInstance();

        $expected = json_encode([
            "success" => false,
            "message" => "Server Error",
            "data" => null,
            "status" => [500, "Internal Server Error"],
        ]);

        $actual = $response->message("Server Error")->status(500)->get();

        $this->assertSame($expected, $actual);
    }

    public function testCreatedWithData(): void
    {
        $response = Response::getInstance();
        $data = ["id" => 123];

        $expected = json_encode([
            "success" => true,
            "message" => "Resource created",
            "data" => $data,
            "status" => [201, "Created"],
        ]);

        $actual = $response->message("Resource created")->status(201)->data($data)->get();

        $this->assertSame($expected, $actual);
    }

    public function testNotFound(): void
    {
        $response = Response::getInstance();

        $expected = json_encode([
            "success" => false,
            "message" => "Resource not found",
            "data" => null,
            "status" => [404, "Not Found"],
        ]);

        $actual = $response->message("Resource not found")->status(404)->get();

        $this->assertSame($expected, $actual);
    }

    public function testUnauthorized(): void
    {
        $response = Response::getInstance();

        $expected = json_encode([
            "success" => false,
            "message" => "Unauthorized access",
            "data" => null,
            "status" => [401, "Unauthorized"],
        ]);

        $actual = $response->message("Unauthorized access")->status(401)->get();

        $this->assertSame($expected, $actual);
    }

    public function testValidationError(): void
    {
        $response = Response::getInstance();

        $expected = json_encode([
            "success" => false,
            "message" => "Validation failed",
            "data" => null,
            "status" => [422, "Unprocessable Content"],
        ]);

        $actual = $response->message("Validation failed")->status(422)->get();

        $this->assertSame($expected, $actual);
    }

    public function testServiceUnavailable(): void
    {
        $response = Response::getInstance();

        $expected = json_encode([
            "success" => false,
            "message" => "Service unavailable",
            "data" => null,
            "status" => [503, "Service Unavailable"],
        ]);

        $actual = $response->message("Service unavailable")->status(503)->get();

        $this->assertSame($expected, $actual);
    }

    public function testEmptyMessage(): void
    {
        $response = Response::getInstance();

        $expected = json_encode([
            "success" => true,
            "message" => "",
            "data" => null,
            "status" => [200, "OK"],
        ]);

        $actual = $response->message("")->status(200)->get();

        $this->assertSame($expected, $actual);
    }

    public function testNestedData(): void
    {
        $response = Response::getInstance();
        $data = ["user" => ["name" => "John", "email" => "john@example.com"]];

        $expected = json_encode([
            "success" => true,
            "message" => "User data",
            "data" => $data,
            "status" => [200, "OK"],
        ]);

        $actual = $response->message("User data")->status(200)->data($data)->get();

        $this->assertSame($expected, $actual);
    }

    public function testNoContent(): void
    {
        $response = Response::getInstance();

        $expected = json_encode([
            "success" => true,
            "message" => "No content",
            "data" => null,
            "status" => [204, "No Content"],
        ]);

        $actual = $response->message("No content")->status(204)->get();

        $this->assertSame($expected, $actual);
    }

    public function testSingletonReturnsSameInstance(): void
    {
        $first = Response::getInstance();
        $second = Response::getInstance();

        $this->assertSame($first, $second);
    }

    public function testResetInstanceCreatesNewObject(): void
    {
        $first = Response::getInstance();
        Response::resetInstance();
        $second = Response::getInstance();

        $this->assertNotSame($first, $second);
    }

    public function testCustomDataKey(): void
    {
        $response = Response::getInstance();
        $data = ["id" => 1, "name" => "Item"];

        $expected = json_encode([
            "success" => true,
            "item" => $data,
            "status" => [200, "OK"],
        ]);

        $actual = $response->data($data, "item")->status(200)->get();

        $this->assertSame($expected, $actual);
    }

    public function testHideStatus(): void
    {
        $response = Response::getInstance();

        $expected = json_encode([
            "success" => true,
            "message" => "OK",
            "data" => null,
        ]);

        $actual = $response->message("OK")->status(200)->hideStatus()->get();

        $this->assertSame($expected, $actual);
    }

    public function testErrorShorthand(): void
    {
        $response = Response::getInstance();

        $expected = json_encode([
            "success" => false,
            "message" => "Something went wrong",
            "data" => null,
            "status" => [500, "Internal Server Error"],
        ]);

        $actual = $response->error("Something went wrong")->get();

        $this->assertSame($expected, $actual);
    }

    public function testStaticCallViaMagicMethod(): void
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Forbidden",
            "data" => null,
            "status" => [403, "Forbidden"],
        ]);

        $actual = Response::message("Forbidden")->status(403)->get();

        $this->assertSame($expected, $actual);
    }
}
