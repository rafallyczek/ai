<?php

use app\controllers\LoginController;
use app\controllers\CalcCurrencyController;

function getRequestParameter($name){
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}

function forwardTo($action_name){
	global $action;
	$action = $action_name;
	include getConfig()->root_path."/mainController.php";
	exit;
}

function redirectTo($action_name){
	header("Location: ".getConfig()->action_url.$action_name);
	exit;
}

function addRole($role){
    getConfig()->roles[$role] = true;
    $_SESSION['_roles'] = serialize(getConfig()->roles);
}

function hasRole($role){
    return isset(getConfig()->roles[$role]);
}

function isLogged(){
    return !empty(getConfig()->roles);
}

function clearRoles(){
    getConfig()->roles = array();
}

function control($controller_name, $method, $roles = null){
    if($roles!=null){
        $hasRole = false;
        if(is_array($roles)){
            foreach ($roles as $role){
                if(hasRole($role)){
                    $hasRole = true;
                    break;
                }
            }
        }else{
            if(hasRole($roles)){
                $hasRole = true;
            }
        }
        if(!$hasRole){
            forwardTo('login');
        }
    }
    $controller_name = "app\\controllers\\".$controller_name;
    include_once getConfig()->root_path.DIRECTORY_SEPARATOR.$controller_name.'.class.php';
    $controller = new $controller_name;
    if(is_callable(array($controller, $method))){
        $controller->$method();
    }
    exit;
}