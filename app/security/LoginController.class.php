<?php

require_once $config->root_path.'/lib/smarty/Smarty.class.php';
require_once $config->root_path.'/lib/Messages.class.php';
require_once $config->root_path.'/app/security/LoginForm.class.php';

class LoginController{
    
    private $form;
    private $messages;
    private $login;
    
    public function __construct(){
        $this->form = new LoginForm();
        $this->messages = new Messages(); 
        $this->login = true;
    }
    
    public function getLoginParams(){
        $this->form->login = isset($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
        $this->form->password = isset($_REQUEST ['password']) ? $_REQUEST ['password'] : null;
    } 
    
    public function validateLogin(){
        if(!(isset($this->form->login) && isset($this->form->password))) {
            return false;
        }
    
        if($this->form->login == "") {
            $this->messages->addError('Nie podano loginu.');
        }
        if($this->form->password == "") {
            $this->messages->addError('Nie podano hasła.');
        }
    
        if($this->messages->isError()){
            return false;
        }
        
        if($this->form->login=="user" && $this->form->password=="pass"){
            session_start();
            $_SESSION['role'] = 'user';
            return true;
        }
    
        $this->messages->addError('Nieprawidłowy login lub hasło.');
        return false;
        
    }
    
    public function processLogin() {
        global $config;
        
        $this->getLoginParams();
        
        if(!$this->validateLogin()){
            $this->generateView();
        }else{
            header("Location: ".$config->app_url);
        }
        
    }
    
    public function generateView(){
        global $config;
        
        $smarty = new Smarty();

        $smarty->assign('config',$config);
        $smarty->assign('page_title','Logowanie');
        $smarty->assign('page_description','Zaloguj się do aplikacji.');

        $smarty->assign('form',$this->form);
        $smarty->assign('messages',$this->messages);
        $smarty->assign('login',$this->login);

        $smarty->display($config->root_path.'/app/security/login.tpl');
    }
    
}