<?php

require_once 'LoginForm.class.php';

class LoginController{
    
    private $form;
    private $login;
    
    public function __construct(){
        $this->form = new LoginForm();
        $this->login = true;
    }
    
    public function getLoginParams(){
        $this->form->login = getRequestParameter('login');
        $this->form->password = getRequestParameter('password');
    } 
    
    public function validateLogin(){
        if(!(isset($this->form->login) && isset($this->form->password))) {
            return false;
        }
    
        if($this->form->login == "") {
            getMessages()->addError('Nie podano loginu.');
        }
        if($this->form->password == "") {
            getMessages()->addError('Nie podano hasła.');
        }
    
        if(getMessages()->isError()){
            return false;
        }
        
        if($this->form->login=="user" && $this->form->password=="pass"){
            session_start();
            $_SESSION['role'] = 'user';
            return true;
        }
    
        getMessages()->addError('Nieprawidłowy login lub hasło.');
        return false;
        
    }
    
    public function processLogin() {

        $this->getLoginParams();
        
        if(!$this->validateLogin()){
            $this->generateView();
        }else{
            header("Location: ". getConfig()->app_url);
        }
        
    }
    
    public function generateView(){
        getSmarty()->assign('page_title','Logowanie');
        getSmarty()->assign('page_description','Zaloguj się do aplikacji.');

        getSmarty()->assign('form',$this->form);
        getSmarty()->assign('login',$this->login);

        getSmarty()->display('login.tpl');
    }
    
}