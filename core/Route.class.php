<?php 

namespace core;

class Route{
	public $controller_name = null;
	public $method = null;
	public $roles = null;
	public function __construct($controller_name,$method,$roles){
		$this->controller_name = $controller_name;
		$this->method = $method;
		$this->roles = $roles;
	}
}