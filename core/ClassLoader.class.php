<?php
namespace core;

class ClassLoader{
    
    public function __construct() {
        spl_autoload_register(function($class){
            $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
            $file = getConfig()->root_path.DIRECTORY_SEPARATOR.$class.'.class.php';
            if(is_readable($file)){
                require_once $file;
            }
        });
    }
    
}