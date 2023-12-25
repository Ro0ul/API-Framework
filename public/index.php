<?php

header("Content-Type: application/json");

use App\Http\Kernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#Constants
define("ROOT",__DIR__ . "/../");

#Autoload
require(ROOT . "vendor/autoload.php");

#Router
require(ROOT . "routes/api.php");

#Getting The Request And Response Variable
$request = Request::createFromGlobals();
$response = new Response;


#Handling Request
$kernel = new Kernel;
$kernel->handle($request,$response);