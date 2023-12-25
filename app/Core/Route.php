<?php declare(strict_types=1);

namespace App\Core;

class Route
{
    private static array $routes = [];

    /**
     * Add a new Route
     * 
     * @param string $method GET | POST | PATCH | PUT | OPTIONS 
     * @param string $url URL Path
     * @param mixed $function The callable to call
     */
    public static function add(string $method,string $url,mixed $function): void
    {
        static::$routes[] = [$method, $url, $function];
    }

    /**
     * Returns all the registered Routes
     */
    public static function getRoutes(): array
    {
        return self::$routes;
    }
}