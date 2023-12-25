<?php declare(strict_types=1);

namespace App\Controllers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController
{
    public function json(mixed $data) : Response 
    {
        return new Response(json_encode($data));
    }
}