<?php

namespace app\controllers;

use core\App;
use core\Message;

class BookListController {
    
    public function action_book_list() {

        $books = App::getDB()->select("books", "*");
        App::getSmarty()->assign("books",$books);
        App::getSmarty()->assign('page_title','Książki');
        App::getSmarty()->display("books.tpl");
        
    }
    
    public function action_book_details() {

        App::getMessages()->addMessage(new Message("Wywołano akcję: book_details", Message::INFO));
       
        App::getSmarty()->display("books.tpl");
        
    }
    
    public function action_book_review() {

        App::getMessages()->addMessage(new Message("Wywołano akcję: book_review", Message::INFO));
       
        App::getSmarty()->display("books.tpl");
        
    }
    
    public function action_book_delete() {

        App::getMessages()->addMessage(new Message("Wywołano akcję: book_delete", Message::INFO));
       
        App::getSmarty()->display("books.tpl");
        
    }
    
    public function action_book_edit() {

        App::getMessages()->addMessage(new Message("Wywołano akcję: book_edit", Message::INFO));
       
        App::getSmarty()->display("books.tpl");
        
    }
    
    public function action_book_add() {

        App::getMessages()->addMessage(new Message("Wywołano akcję: book_add", Message::INFO));
       
        App::getSmarty()->display("books.tpl");
        
    }
    
}
