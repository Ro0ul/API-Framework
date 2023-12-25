<?php declare(strict_types=1);

namespace App\Http;

use App\Core\Route;
use FastRoute\Dispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Libraries\Container;

class Kernel 
{
    public function handle(Request $request,Response $response) : Response
    {
        $response->headers->set("Content-Type","application/json");
        $dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
            $routes = Route::getRoutes();
            foreach($routes as $route){
                $method = $route[0];
                $uri = $route[1];
                $callback = $route[2];
                $r->addRoute($method, $uri, $callback);
            }
        });

        #Getting The URL And Method from the Request

        $httpMethod = $request->getMethod();
        $uri = $request->getRequestUri();

        #Removing the ? query params from the uri string

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                $response->setContent(
                    json_encode("Not Found")
                );
                $response->setStatusCode(404);
                return $response->send();
            case Dispatcher::METHOD_NOT_ALLOWED:
                $response->setContent(
                    json_encode("Method Not Allowed")
                );
                $response->setStatusCode(405);
                return $response->send();
            case Dispatcher::FOUND:
                #Calling the method
                $container = Container::getInstance();
                return $container->call($routeInfo[1]);
        }
    }
}