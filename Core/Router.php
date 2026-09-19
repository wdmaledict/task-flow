<?php

namespace Core;

class Router
{
  protected $routes = [];

  public function add($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => []
    ];

    // Return $this so route definitions can be chained,
    // e.g. $router->get(...)->auth();
    return $this;
  }

  public function get($uri, $controller)
  {
    return $this->add('GET', $uri, $controller);
  }

  public function post($uri, $controller)
  {
    return $this->add('POST', $uri, $controller);
  }

  public function delete($uri, $controller)
  {
    return $this->add('DELETE', $uri, $controller);
  }

  public function patch($uri, $controller)
  {
    return $this->add('PATCH', $uri, $controller);
  }

  public function put($uri, $controller)
  {
    return $this->add('PUT', $uri, $controller);
  }

  // Marks the LAST route that was added as requiring a logged-in user.

  public function auth()
  {
    $this->routes[array_key_last($this->routes)]['middleware'][] = 'auth';
    return $this;
  }

  // Marks the LAST route that was added as requiring a guest (not logged in).

  public function guest()
  {
    $this->routes[array_key_last(($this->routes))]['middleware'][] = 'guest';
    return $this;
  }

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        $this->handleMiddleware($route['middleware']);

        return require base_path($route['controller']);
      }
    }

    $this->abort();
  }

  protected function handleMiddleware($middleware)
  {
    foreach ($middleware as $name) {
      if ($name === 'guest' && isset($_SESSION['user'])) {
        // Redirect logged-in users away from guest-only routes (e.g. /login, /register)
        header('location: /');
        exit();
      }
      if ($name === 'auth' && !isset($_SESSION['user'])) {
        // Redirect unauthenticated users to login when a route requires auth
        header('location: /login');
        exit();
      }
    }
  }

  protected function abort($code = 404)
  {
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
  }
}
