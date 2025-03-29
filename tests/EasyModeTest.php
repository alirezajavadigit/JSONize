<?php

namespace JSONize\Tests;

use PHPUnit\Framework\TestCase;
use JSONize\App\Easy\Response;

class EasyModeTest extends TestCase
{
    public function testSuccess()
    {
        $expected = json_encode([
            "success" => true,
            "message" => "success",
            "data" => null,
            "status" => [200, "OK"]
        ]);
        $actual = Response::message("success")->status(200)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testError()
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Server Error",
            "data" => null,
            "status" => [500, "Internal Server Error"]
        ]);
        $actual = Response::message("Server Error")->status(500)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testCreatedWithData()
    {
        $data = ["id" => 123];
        $expected = json_encode([
            "success" => true,
            "message" => "Resource created",
            "data" => $data,
            "status" => [201, "Created"]
        ]);
        $actual = Response::message("Resource created")->status(201)->data($data)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testNotFound()
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Resource not found",
            "data" => null,
            "status" => [404, "Not Found"]
        ]);
        $actual = Response::message("Resource not found")->status(404)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testUnauthorized()
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Unauthorized access",
            "data" => null,
            "status" => [401, "Unauthorized"]
        ]);
        $actual = Response::message("Unauthorized access")->status(401)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testValidationError()
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Validation failed",
            "data" => null,
            "status" => [422, "Unprocessable Entity"]
        ]);
        $actual = Response::message("Validation failed")->status(422)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testServiceUnavailable()
    {
        $expected = json_encode([
            "success" => false,
            "message" => "Service unavailable",
            "data" => null,
            "status" => [503, "Service Unavailable"]
        ]);
        $actual = Response::message("Service unavailable")->status(503)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testEmptyMessage()
    {
        $expected = json_encode([
            "success" => true,
            "message" => "",
            "data" => null,
            "status" => [200, "OK"]
        ]);
        $actual = Response::message("")->status(200)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testNestedData()
    {
        $data = ["user" => ["name" => "John", "email" => "john@example.com"]];
        $expected = json_encode([
            "success" => true,
            "message" => "User data",
            "data" => $data,
            "status" => [200, "OK"]
        ]);
        $actual = Response::message("User data")->status(200)->data($data)->get();
        $this->assertEquals($expected, $actual);
    }

    public function testNoContent()
    {
        $expected = json_encode([
            "success" => true,
            "message" => "No content",
            "data" => null,
            "status" => [204, "No Content"]
        ]);
        $actual = Response::message("No content")->status(204)->get();
        $this->assertEquals($expected, $actual);
    }
}
