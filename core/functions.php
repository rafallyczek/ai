<?php

function getRequestParameter($name){
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}

function forwardTo($action_name){
	getRouter()->setAction($action_name);
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