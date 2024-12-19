<?php


namespace Tatib\Src;

use Tatib\Src\Core\Helper;

class Router
{
    protected $routes = [];

    public function addRoute($method, $route, $controller, ?string $action)
    {
        $this->routes[$route] = ['method' => $method, 'controller' => $controller, 'action' => $action];
    }

    public function dispatch($method, $uri)
    {
        foreach ($this->routes as $route => $target) {
            Helper::dumpToLog($route . ' => ' . $uri);
            if (preg_match('#^' . $route . '$#', $uri)) {
                $controller = $target['controller'];
                $action = $target['action'];

                $lastHyphenIndex = strrpos($uri, '-');
                if ($lastHyphenIndex !== false) {
                    $uri = substr_replace($uri, '.', $lastHyphenIndex, 1);
                }

                $uri = preg_replace('/public/', '', $uri);

                $controller = new $controller();
                $controller->$action($uri);
                return;
            }
        }

        if (array_key_exists($uri, $this->routes) && $this->routes[$uri]['method'] === $method) {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            session_start();
            $_SESSION['Error'] = 'URL ' . $uri . ' tidak ditemukan';

            header("Location: /");
        }
    }
}