<?php

namespace app\controllers;

use core\App;
use core\Message;

class LoginController{
    
    public function action_login(){
        
        App::getMessages()->addMessage(new Message('Wywołano akcję: login', Message::INFO));
        App::getSmarty()->display('books.tpl');
        
    }
    
    public function action_logout(){
        
        App::getMessages()->addMessage(new Message('Wywołano akcję: logout', Message::INFO));
        App::getSmarty()->display('books.tpl');
        
    }
    
}