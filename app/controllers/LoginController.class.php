<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Validator;
use core\RoleUtils;
use core\SessionUtils;

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
        
        $user = App::getDB()->select("users", "*", ["login" => $login]);
        
        if(!$user){
            App::getMessages()->addMessage(new Message('Nieprawidłowy login lub hasło.', Message::ERROR));
            App::getSmarty()->assign('login',$login);
            return false;
        }
        
        if($user[0]['password']==$password){
            RoleUtils::addRole($user[0]['role']);
            SessionUtils::store("logged_user",$user);
            return true;
        }
        
        App::getMessages()->addMessage(new Message('Nieprawidłowy login lub hasło.', Message::ERROR));
        App::getSmarty()->assign('login',$login);
        return false;
        
    }
    
    public function action_show_login(){
        
        if(RoleUtils::inAnyRole()){
            App::getSmarty()->assign('page_title','Strona główna');
            App::getSmarty()->display('main.tpl');
        }else{
            App::getSmarty()->assign('page_title','Logowanie');
            App::getSmarty()->display('login.tpl');
        }
        
    }
    
    public function action_login(){
        
        if(RoleUtils::inAnyRole()){
            App::getSmarty()->assign('page_title','Strona główna');
            App::getSmarty()->display('main.tpl');
        }else{
            if(!$this->validateLogin()){
                App::getSmarty()->display('login.tpl');
            }else{
                App::getRouter()->redirectTo('show_main_page');
            }
        }
        
    }
    
    public function action_logout(){
        
        if(RoleUtils::inAnyRole()){
            session_destroy();
            App::getRouter()->redirectTo('show_login');
        }else{
            App::getSmarty()->assign('page_title','Logowanie');
            App::getSmarty()->display('login.tpl');
        }
        
    }
    
    public function action_show_register(){
        
        App::getSmarty()->assign('page_title','Rejestracja');
        App::getSmarty()->display('register.tpl');
        
    }
    
    public function action_register(){
        
        $validator = new Validator();
        
        $login = $validator->validateFromRequest("login", [
            'required' => true,
            'required_message' => 'Login jest wymagany.',
            'min_length' => 4,
            'validator_message' => 'Login musi mieć przynajmniej 4 znaki.',
        ]);
        
        if(!$validator->isLastOK()){
            App::getSmarty()->assign('page_title',"Rejestracja");
            App::getSmarty()->display("register.tpl");
            exit();
        }

        $password = $validator->validateFromRequest("password", [
            'required' => true,
            'required_message' => 'Hasło jest wymagane.',
            'min_length' => 4,
            'validator_message' => 'Hasło musi mieć przynajmniej 4 znaki.',
        ]);
        
        if(!$validator->isLastOK()){
            App::getSmarty()->assign('page_title',"Rejestracja");
            App::getSmarty()->display("register.tpl");
            exit();
        }
        
        $username = $validator->validateFromRequest("username", [
            'required' => true,
            'required_message' => 'Nazwa użytkownika jest wymagana.',
            'min_length' => 1,
            'validator_message' => 'Nie podano nazwy użytkownika.',
        ]);
        
        if(!$validator->isLastOK()){
            App::getSmarty()->assign('page_title',"Rejestracja");
            App::getSmarty()->display("register.tpl");
            exit();
        }
        
        App::getDB()->insert("users", [
            "login" => $login,
            "password" => $password,
            "username" => $username,
            "role" => "user",
        ]);
        
        App::getRouter()->redirectTo('show_login');
        
    }
    
}