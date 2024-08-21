<?php

namespace Core;


class Router
{
    protected $routes = [];

    public function add($method, $path, $callback)
    {
        $this->routes[$method][$path] = $callback;
    }

    public function get($path, $callback)
    {
        return $this->add('GET', $path, $callback);
    }

    public function post($path, $callback)
    {
        return $this->add('POST', $path, $callback);
    }

    public function put($path, $callback)
    {
        return $this->add('PUT', $path, $callback);
    }

    public function patch($path, $callback)
    {
        return $this->add('PATCH', $path, $callback);
    }

    public function delete($path, $callback)
    {
        return $this->add('DELETE', $path, $callback);
    }

    public function register()
    {
        $path = getPath()['path'];
        $method = getMethod();

        if (isset(getData()['_method'])) {
            $method = getData()['_method'];
        }

        if (isset($this->routes[$method][$path])) {
            $callback = $this->routes[$method][$path];
            if (is_array($callback)) {
                $class = $callback[0];
                $method = $callback[1];
                if (class_exists($class) && method_exists($class, $method)) {
                    $controller = new $class();
                    return call_user_func([$controller, $method]);
                }
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
