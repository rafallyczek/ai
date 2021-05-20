<?php
require_once dirname(__FILE__).'/../../config.php';

require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

function getLoginParams(&$form){
    $form['login'] = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
    $form['password'] = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
}

function validateLogin(&$form,&$messages){
    
    if(!(isset($form['login']) && isset($form['password']))){
        return false;
    }
    
    if($form['login']==""){
        $messages [] = 'Nie podano loginu.';
    }
    if($form['password']==""){
        $messages [] = 'Nie podano hasła.';
    }
    
    if(count($messages)>0){
        return false;
    }
    
    if($form['login']=="user" && $form['password']=="pass"){
        session_start();
        $_SESSION['role'] = 'user';
        return true;
    }
    
    $messages [] = 'Nieprawidłowy login lub hasło';
    return false;
    
}

//KONTROLER: 

$form = array();
$messages = array();
$login = true;

getLoginParams($form);
if(!validateLogin($form, $messages)){
    $smarty = new Smarty();

    $smarty->assign('app_url',_APP_URL);
    $smarty->assign('app_root',_APP_ROOT);
    $smarty->assign('root_path',_ROOT_PATH);
    $smarty->assign('page_title','Logowanie');
    $smarty->assign('page_description','Zaloguj się do aplikacji.');

    $smarty->assign('form',$form);
    $smarty->assign('messages',$messages);
    $smarty->assign('login',$login);
    
    $smarty->display(_ROOT_PATH.'/app/security/login.tpl');
}else{
    header("Location: "._APP_URL);
}