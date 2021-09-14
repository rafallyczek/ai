<?php

namespace app\controllers;

use core\App;
use core\Message;

class MainController{
    
    public function action_show_main_page() {
        
        $books = App::getDB()->select("books", "*");
        shuffle($books);
        $books = array_slice($books,0,3);
        App::getSmarty()->assign("books",$books);
        App::getSmarty()->assign('page_title','Strona główna');
        App::getSmarty()->display("main.tpl");
        
    }
    
}
