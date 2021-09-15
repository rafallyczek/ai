<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\ParamUtils;

class BookController {
    
    public function action_book_list() {

        $books = App::getDB()->select("books", "*");
        App::getSmarty()->assign("books",$books);
        App::getSmarty()->assign('page_title','Książki');
        App::getSmarty()->display("books.tpl");
        
    }
    
    public function action_book_details() {

        $id = ParamUtils::getFromCleanURL(1);
        $book = App::getDB()->select("books", "*", ["id" => $id]);
        App::getSmarty()->assign("book",$book);
        App::getSmarty()->assign('page_title',$book[0]["title"]);
        App::getSmarty()->display("book.tpl");
        
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
