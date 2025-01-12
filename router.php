<?php

class Router {
    private $routes = [];

    // Menambahkan rute
    public function add($uri, $action) {
        $this->routes[$uri] = $action;
    }

    // Menangani URI
    public function dispatch($uri) {
        foreach ($this->routes as $route => $action) {
            // Konversi `{param}` menjadi regex
            $pattern = '@^' . preg_replace('/\{[^\}]+\}/', '([^/]+)', $route) . '$@';
            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // Hapus elemen pertama (cocokkan seluruh URI)
                [$controller, $method] = $action;

                if (class_exists($controller) && method_exists($controller, $method)) {
                    $controllerInstance = new $controller();
                    call_user_func_array([$controllerInstance, $method], $matches);
                } else {
                    $this->error404();
                }
                return;
            }
        }
        $this->error404();
    }

    private function error404() {
        http_response_code(404);
        echo "404 Not Found";
    }
}
