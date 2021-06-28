<?php

use core\ClassLoader;
use core\Router;
use core\Messages;

require_once dirname(__FILE__).'/core/Config.class.php';
$config = new core\Config();
include dirname(__FILE__).'/config.php';

function &getConfig(){
    global $config;
    return $config;
}

require_once getConfig()->root_path.'/core/Messages.class.php';
$messages = new Messages();

function &getMessages(){
    global $messages;
    return $messages;
}

$smarty = null;
function &getSmarty(){
    global $smarty;
    if(!isset($smarty)){
        include_once getConfig()->root_path.'/lib/smarty/Smarty.class.php';
        $smarty = new Smarty();
        $smarty->assign('config',getConfig());
        $smarty->assign('messages',getMessages());
        $smarty->setTemplateDir(array(
            'views'=>getConfig()->root_path.'/app/views',
            'templates'=> getConfig()->root_path.'/app/views/templates'
            ));
    }
    return $smarty;
}

require_once getConfig()->root_path.'/core/ClassLoader.class.php';
$classLoader = new ClassLoader();
function &getLoader() {
    global $classLoader;
    return $classLoader;
}

require_once getConfig()->root_path.'/core/Router.class.php';
$router = new Router();
function &getRouter() {
    global $router; 
    return $router;
}

$database = null;
function &getDatabase(){
    global $config;
    global $database;
    if(!isset($database)){
        require_once getConfig()->root_path.'/lib/medoo/Medoo.class.php';
        $database = new \Medoo\Medoo([
            'database_type' => &$config->db_type,
            'server' => &$config->db_server,
            'database_name' => &$config->db_name,
            'username' => &$config->db_user,
            'password' => &$config->db_pass,
            'charset' => &$config->db_charset,
            'port' => &$config->db_port,
            'option' => &$config->db_option
        ]);
    }
    return $database;
}

require_once getConfig()->root_path.'/core/functions.php';

session_start();
$config->roles = isset($_SESSION['_roles']) ? unserialize($_SESSION['_roles']) : array();

$router->setAction( getRequestParameter('action') );