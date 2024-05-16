<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);
require "vendor/autoload.php";


use JSONize\App\Response;


$response = Response::getInstance();

echo ($response->status(204)->end());

