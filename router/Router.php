<?php
class Router {
    private $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'PATCH' => [],
        'DELETE' => [],
    ];

    public function add(string $method, string $route, mixed $callback) {
        $route = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route);
        $route = rtrim($route, '/'). '/?';
        $this->routes[$method][$route] = $callback; // Normalize urls by stripping trailing slashes
    }

    public function get(string $route, mixed $callback) {
        $this->add('GET', $route, $callback);
    }
    public function post(string $route, mixed $callback) {
        $this->add('POST', $route, $callback);
    }
    public function delete(string $route, mixed $callback) {
        $this->add('DELETE', $route, $callback);
    }

    // public function dispatch(string $uri) {

    //     $uri = parse_url($uri, PHP_URL_PATH);

    //     // Remove the project base path
    //     if (defined('BASE_PATH') && str_starts_with($uri, BASE_PATH)) {
    //         $uri = substr($uri, strlen(BASE_PATH));
    //     }

    //     // Normalize URL
    //     $uri = rtrim($uri, '/');
    //     $uri = $uri === '' ? '/' : $uri;

    //     $method = $_SERVER['REQUEST_METHOD'];

    //     if ($method === 'POST' && isset($_POST['_method'])) {
    //         $method = strtoupper($_POST['_method']);
    //     }

    //     $routes = $this->routes[$method] ?? [];

    //     foreach ($routes as $route => $callback) {

    //         if (preg_match("#^$route$#", $uri, $matches)) {

    //             array_shift($matches);

    //             $params = array_map(function ($p) {
    //                 return is_numeric($p) ? (int)$p : $p;
    //             }, $matches);

    //             call_user_func_array($callback, $params);

    //             return;
    //         }
    //     }

    //     include 'views/404.php';
    // }

    public function dispatch(string $uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        // Remove application base path
        if (defined('BASE_PATH') && str_starts_with($uri, BASE_PATH)) {
            $uri = substr($uri, strlen(BASE_PATH));
        }

        // Normalize URL
        $uri = rtrim($uri, '/');

        $uri = $uri === '' ? '/' : $uri;

        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }

        $routes = $this->routes[$method] ?? [];

        foreach ($routes as $route => $callback) {

            if (preg_match("#^$route$#", $uri, $matches)) {

                array_shift($matches);

                $params = array_map(function ($p) {
                    return is_numeric($p) ? (int)$p : $p;
                }, $matches);

                call_user_func_array($callback, $params);

                return;
            }
        }

        http_response_code(404);

        include __DIR__ . '/../views/404.php';
    }
}