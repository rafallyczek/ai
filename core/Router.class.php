<?php

namespace core;

class Router {
    
    public $action = null;
    public $routes = array();
    private $default = null;
    
    public function setAction($action) {
        $this->action = $action;
    }
    
    public function addRoute($action, $controller_name, $roles = null) {
        $this->routes[$action] = new Route($controller_name, 'action_'.$action, $roles);
    }

    public function setDefaultRoute($route) {
        $this->default = $route;
    }
    
    private function control($controller_name, $method, $roles = null) {
        if ($roles!=null) {
            $hasRole = false;
            if (is_array($roles)) {
                foreach ($roles as $role) {
                    if (hasRole($role)) {
                        $hasRole = true;
                        break;
                    }
                }
            } else {
                if (hasRole($roles))
                    $hasRole = true;
            }
            if (!$hasRole){
                forwardTo('login');
            }   
        }
        $controller_name = "app\\controllers\\".$controller_name;
        $controller = new $controller_name;
        if(is_callable(array($controller, $method))){
            $controller->$method();
        }
        exit;
    }

    public function go() {
        if (isset($this->routes[$this->action])) {
            $r = $this->routes[$this->action];
            $this->control($r->controller_name, $r->method, $r->roles);
        } else {
            if (isset($this->default) && isset($this->routes[$this->default])) {
                $r = $this->routes[$this->default];
                $this->control($r->controller_name, $r->method, $r->roles);
            }
        }
    }
    
}