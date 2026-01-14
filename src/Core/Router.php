<?php

namespace Communitytable\Foodbank\Core;

class Router
{
    protected array $routes = [];

    /**
     * Register a GET route
     */
    public function get(string $uri, string $controller, string $action): void
    {
        $this->addRoute('GET', $uri, $controller, $action);
    }

    /**
     * Register a POST route
     */
    public function post(string $uri, string $controller, string $action): void
    {
        $this->addRoute('POST', $uri, $controller, $action);
    }

    /**
     * Internal route storage
     */
    protected function addRoute(
        string $method,
        string $uri,
        string $controller,
        string $action
    ): void {
        $this->routes[$method][$uri] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    /**
     * Dispatch the current request
     */
    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        // Remove query string
        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        // Adjust base path if needed (VERY IMPORTANT)
        $uri = str_replace('/cw2/public', '', $uri);
        if ($uri === '') {
            $uri = '/';
        }

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        $route = $this->routes[$method][$uri];
        $controllerClass = $route['controller'];
        $action = $route['action'];

        if (!class_exists($controllerClass)) {
            throw new \Exception("Controller not found: $controllerClass");
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            throw new \Exception("Action '$action' not found in controller $controllerClass");
        }

        $controller->$action();
    }
}
