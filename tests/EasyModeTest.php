<?php

namespace JSONize\Tests;

use PHPUnit\Framework\TestCase;
use JSONize\App\Easy\Response;

class EasyModeTest extends TestCase
{
    public function testSuccess(): void
    {
        $expected = json_encode([
            "success" => true,
            "message" => "success",
            "data" => null,
            "status" => [200, "OK"],
        ]);

        $actual = Response::message("success")->status(200)->get();

        $this->assertSame($expected, $actual);
    }

    public function testError(): void
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Server Error",
            "data" => null,
            "status" => [500, "Internal Server Error"],
        ]);

        $actual = Response::message("Server Error")->status(500)->get();

        $this->assertSame($expected, $actual);
    }

    public function testCreatedWithData(): void
    {
        $data = ["id" => 123];

        $expected = json_encode([
            "success" => true,
            "message" => "Resource created",
            "data" => $data,
            "status" => [201, "Created"],
        ]);

        $actual = Response::message("Resource created")->status(201)->data($data)->get();

        $this->assertSame($expected, $actual);
    }

    public function testNotFound(): void
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Resource not found",
            "data" => null,
            "status" => [404, "Not Found"],
        ]);

        $actual = Response::message("Resource not found")->status(404)->get();

        $this->assertSame($expected, $actual);
    }

    public function testUnauthorized(): void
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Unauthorized access",
            "data" => null,
            "status" => [401, "Unauthorized"],
        ]);

        $actual = Response::message("Unauthorized access")->status(401)->get();

        $this->assertSame($expected, $actual);
    }

    public function testValidationError(): void
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Validation failed",
            "data" => null,
            "status" => [422, "Unprocessable Content"],
        ]);

        $actual = Response::message("Validation failed")->status(422)->get();

        $this->assertSame($expected, $actual);
    }

    public function testServiceUnavailable(): void
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Service unavailable",
            "data" => null,
            "status" => [503, "Service Unavailable"],
        ]);

        $actual = Response::message("Service unavailable")->status(503)->get();

        $this->assertSame($expected, $actual);
    }

    public function testEmptyMessage(): void
    {
        $expected = json_encode([
            "success" => true,
            "message" => "",
            "data" => null,
            "status" => [200, "OK"],
        ]);

        $actual = Response::message("")->status(200)->get();

        $this->assertSame($expected, $actual);
    }

    public function testNestedData(): void
    {
        $data = ["user" => ["name" => "John", "email" => "john@example.com"]];

        $expected = json_encode([
            "success" => true,
            "message" => "User data",
            "data" => $data,
            "status" => [200, "OK"],
        ]);

        $actual = Response::message("User data")->status(200)->data($data)->get();

        $this->assertSame($expected, $actual);
    }

    public function testNoContent(): void
    {
        $expected = json_encode([
            "success" => true,
            "message" => "No content",
            "data" => null,
            "status" => [204, "No Content"],
        ]);

        $actual = Response::message("No content")->status(204)->get();

        $this->assertSame($expected, $actual);
    }

    public function testCustomDataKey(): void
    {
        $data = ["id" => 1, "name" => "Item"];

        $expected = json_encode([
            "success" => true,
            "item" => $data,
            "status" => [200, "OK"],
        ]);

        $actual = Response::data($data, "item")->status(200)->get();

        $this->assertSame($expected, $actual);
    }

    public function testHideStatus(): void
    {
        $expected = json_encode([
            "success" => true,
            "message" => "OK",
            "data" => null,
        ]);

        $actual = Response::message("OK")->status(200)->hideStatus()->get();

        $this->assertSame($expected, $actual);
    }

    public function testHideSuccess(): void
    {
        $expected = json_encode([
            "message" => "OK",
            "data" => null,
            "status" => [200, "OK"],
        ]);

        $actual = Response::message("OK")->status(200)->hideSuccess()->get();

        $this->assertSame($expected, $actual);
    }

    public function testErrorShorthand(): void
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Something went wrong",
            "data" => null,
            "status" => [500, "Internal Server Error"],
        ]);

        $actual = Response::error("Something went wrong")->get();

        $this->assertSame($expected, $actual);
    }

    public function testErrorShorthandWithStatus(): void
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Bad input",
            "data" => null,
            "status" => [400, "Bad Request"],
        ]);

        $actual = Response::error("Bad input", 400)->get();

        $this->assertSame($expected, $actual);
    }

    public function testCustomStatusMessage(): void
    {
        $expected = json_encode([
            "success" => true,
            "data" => null,
            "status" => [200, "All good"],
        ]);

        $actual = Response::status(200, "All good")->get();

        $this->assertSame($expected, $actual);
    }
}
