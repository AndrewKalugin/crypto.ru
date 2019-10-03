<?php

namespace Core;

class Router
{

    protected $routes = [];
    protected $params = [];

    # Возвращает запрос из адресной строки
    public function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    # Добавление новых страниц в базу
    public function add($route, $params = [])
    {
        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';
        $this->routes[$route] = $params;
    }

    # Проверка совпадения путей
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    # Проверка существование контроллера и метода
    public function run($url)
    {
        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->getNamespace() . ucfirst($controller) . 'Controller';

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = 'action' . ucfirst($action);

                if (preg_match('/action$/i', $action) == 0) {
                    $controller_object->$action();

                } else {
                    throw new \Exception("Error - Method $action in controller $controller");
                }
            } else {
                throw new \Exception("$controller not found");
            }
        } else {
            throw new \Exception('No these route', 404);
        }
    }

    # Преобразование названия контроллера с добавлением namespace
    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }
}
