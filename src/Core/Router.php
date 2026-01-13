<?php

namespace Communitytable\Foodbank\Core;

class Router
{
    private array $routes = [];

    public function get(string $path, string $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, string $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        [$controller, $action] = explode('@', $this->routes[$method][$uri]);

        $controllerClass = "App\\Controllers\\$controller";
        $controllerInstance = new $controllerClass();

        $controllerInstance->$action();
    }
}
