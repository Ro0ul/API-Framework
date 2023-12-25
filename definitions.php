<?php 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

return [
    Request::class => function(){
        return new Request();
    },
    Response::class => function(){
        return new Response(status:200);
    }
];