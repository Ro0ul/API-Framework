<?php declare(strict_types=1);

namespace App\Controllers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends BaseController
{
    public function index(Request $request,Response $response) : Response
    {
        return $this->json("Hello Bro")->send();
    }
}