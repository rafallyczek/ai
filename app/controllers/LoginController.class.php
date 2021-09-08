<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Validator;
use core\RoleUtils;

class LoginController{
    
    public function validateLogin(){
        
        $validator = new Validator();
        
        $login = $validator->validateFromRequest("login", [
            'required' => true,
            'required_message' => 'Login jest wymagany.',
            'min_length' => 1,
            'validator_message' => 'Nie podano loginu.',
        ]);
        
        if(!$validator->isLastOK()){
            return false;
        }

        $password = $validator->validateFromRequest("password", [
            'required' => true,
            'required_message' => 'Hasło jest wymagane.',
            'min_length' => 1,
            'validator_message' => 'Nie podano hasła.',
        ]);
        
        if(!$validator->isLastOK()){
            return false;
        }
        
        $user = App::getDB()->select("users", ["login","password","role"], ["login" => $login]);
        
        if(!$user){
            App::getMessages()->addMessage(new Message('Nieprawidłowy login lub hasło.', Message::ERROR));
            App::getSmarty()->assign('login',$login);
            return false;
        }
        
        if($user[0]['password']==$password){
            RoleUtils::addRole($user[0]['role']);
            return true;
        }
        
        App::getMessages()->addMessage(new Message('Nieprawidłowy login lub hasło.', Message::ERROR));
        App::getSmarty()->assign('login',$login);
        return false;
        
    }
    
    public function action_show_login(){
        
        App::getSmarty()->display('login.tpl');
        
    }
    
    public function action_login(){
        
        if(!$this->validateLogin()){
            App::getSmarty()->display('login.tpl');
        }else{
            App::getRouter()->redirectTo('show_main_page');
        }
        
    }
    
    public function action_logout(){
        
        session_destroy();
        App::getRouter()->redirectTo('show_login');
        
    }
    
}