<?php

namespace JSONize\Tests;

use PHPUnit\Framework\TestCase;
use JSONize\App\Efficient\Response;

class EfficientModeTest extends TestCase
{
    protected function setUp(): void
    {
        // Reset the singleton before each test
        Response::resetInstance();
    }
    public function testSuccess()
    {
        $this->setUp();
        $response = Response::getInstance();
        $expected = json_encode([
            "success" => true,
            "message" => "success",
            "data" => null,
            "status" => [200, "OK"]
        ]);
        $actual = $response->message("success")->status(200)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testError()
    {
        $this->setUp();
        $response = Response::getInstance();
        $expected = json_encode([
            "success" => false,
            "message" => "Server Error",
            "data" => null,
            "status" => [500, "Internal Server Error"]
        ]);
        $actual = $response->message("Server Error")->status(500)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testCreatedWithData()
    {
        $this->setUp();
        $response = Response::getInstance();
        $data = ["id" => 123];
        $expected = json_encode([
            "success" => true,
            "message" => "Resource created",
            "data" => $data,
            "status" => [201, "Created"]
        ]);
        $actual = $response->message("Resource created")->status(201)->data($data)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testNotFound()
    {
        $this->setUp();
        $response = Response::getInstance();
        $expected = json_encode([
            "success" => false,
            "message" => "Resource not found",
            "data" => null,
            "status" => [404, "Not Found"]
        ]);
        $actual = $response->message("Resource not found")->status(404)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testUnauthorized()
    {
        $this->setUp();
        $response = Response::getInstance();
        $expected = json_encode([
            "success" => false,
            "message" => "Unauthorized access",
            "data" => null,
            "status" => [401, "Unauthorized"]
        ]);
        $actual = $response->message("Unauthorized access")->status(401)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testValidationError()
    {
        $this->setUp();
        $response = Response::getInstance();
        $expected = json_encode([
            "success" => false,
            "message" => "Validation failed",
            "data" => null,
            "status" => [422, "Unprocessable Entity"]
        ]);
        $actual = $response->message("Validation failed")->status(422)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testServiceUnavailable()
    {
        $this->setUp();
        $response = Response::getInstance();
        $expected = json_encode([
            "success" => false,
            "message" => "Service unavailable",
            "data" => null,
            "status" => [503, "Service Unavailable"]
        ]);
        $actual = $response->message("Service unavailable")->status(503)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testEmptyMessage()
    {
        $this->setUp();
        $response = Response::getInstance();
        $expected = json_encode([
            "success" => true,
            "message" => "",
            "data" => null,
            "status" => [200, "OK"]
        ]);
        $actual = $response->message("")->status(200)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testNestedData()
    {
        $this->setUp();
        $response = Response::getInstance();
        $data = ["user" => ["name" => "John", "email" => "john@example.com"]];
        $expected = json_encode([
            "success" => true,
            "message" => "User data",
            "data" => $data,
            "status" => [200, "OK"]
        ]);
        $actual = $response->message("User data")->status(200)->data($data)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testNoContent()
    {
        $this->setUp();
        $response = Response::getInstance();
        $expected = json_encode([
            "success" => true,
            "message" => "No content",
            "data" => null,
            "status" => [204, "No Content"]
        ]);
        $actual = $response->message("No content")->status(204)->get();
        $this->assertEquals($expected, $actual);
    }
}
