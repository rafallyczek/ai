<?php
require_once dirname(__FILE__).'/../../config.php';

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

getLoginParams($form);
if(!validateLogin($form, $messages)){
    include _ROOT_PATH.'/app/security/login_view.php';
}else{
    header("Location: "._APP_URL);
}