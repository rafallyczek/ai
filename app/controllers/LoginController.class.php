<?php
namespace app\controllers;

use app\transfer\User;
use app\forms\LoginForm;

class LoginController{
    
    private $form;
    
    public function __construct(){
        $this->form = new LoginForm();
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
            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }
            $user = new User($this->form->login,'user');
            $_SESSION['user'] = serialize($user);
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
            header("Location: ".getConfig()->app_url);
        }
        
    }
    
    public function processLogout(){
        
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        session_destroy();
        $this->generateView();
        
    }
    
    public function generateView(){
        getSmarty()->assign('page_title','Logowanie');
        getSmarty()->assign('page_description','Zaloguj się do aplikacji.');

        getSmarty()->assign('form',$this->form);

        getSmarty()->display('login.tpl');
    }
    
}