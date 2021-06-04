<?php
require_once dirname(__FILE__).'/core/Config.class.php';
$config = new core\Config();
include dirname(__FILE__).'/config.php';

function &getConfig(){
    global $config;
    return $config;
}

require_once getConfig()->root_path.'/core/Messages.class.php';
$messages = new core\Messages();

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
$classLoader = new core\ClassLoader();

function &getLoader() {
    global $classLoader;
    return $classLoader;
}

require_once getConfig()->root_path.'/core/functions.php';
$action = getRequestParameter('action');