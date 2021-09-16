<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Validator;
use core\ParamUtils;
use core\SessionUtils;

class BookController {
    
    //Wyświetlenie listy książek
    public function action_book_list() {

        $books = App::getDB()->select("books", "*");
        App::getSmarty()->assign("books",$books);
        App::getSmarty()->assign('page_title','Książki');
        App::getSmarty()->display("books.tpl");
        
    }
    
    //Wyświetlenie szczegółów książki
    public function action_book_details() {

        $id = ParamUtils::getFromCleanURL(1);
        $book = App::getDB()->select("books", "*", ["id" => $id]);
        $reviews = App::getDB()->select("reviews", "*", ["book_id" => $id]);
        App::getSmarty()->assign("book",$book);
        App::getSmarty()->assign("reviews",$reviews);
        App::getSmarty()->assign('page_title',$book[0]["title"]);
        App::getSmarty()->display("book.tpl");
        
    }
    
    //Wyświetlenie formularza z dodawaniem recenzji
    public function action_book_review() {

        $id = ParamUtils::getFromCleanURL(1);
        App::getSmarty()->assign("book_id",$id);
        App::getSmarty()->assign('page_title',"Recenzja");
        App::getSmarty()->display("review.tpl");
        
    }
    
    //Dodanie recenzji
    public function action_add_review() {
        
        $validator = new Validator();
        
        $content = $validator->validateFromRequest("content", [
            'required' => true,
            'required_message' => 'Treść jest wymagana.',
            'min_length' => 1,
            'validator_message' => 'Nie wprowadzono żadnych znaków.',
        ]);
       
        if($validator->isLastOK()){
            $user = SessionUtils::load("logged_user",true);
            $score = ParamUtils::getFromPost("score");
            $book_id = ParamUtils::getFromPost("book_id");
            App::getDB()->insert("reviews", [
                "score" => $score,
                "description" => $content,
                "username" => $user[0]["login"],
                "user_id" => $user[0]["id"],
                "book_id" => $book_id
            ]);
            $book = App::getDB()->select("books", "*", ["id" => $book_id]);
            $reviews = App::getDB()->select("reviews", "*", ["book_id" => $book_id]);
            App::getSmarty()->assign("book",$book);
            App::getSmarty()->assign("reviews",$reviews);
            App::getSmarty()->assign('page_title',$book[0]["title"]);
            App::getSmarty()->display("book.tpl");
        }else{
            App::getSmarty()->assign("book_id",$book_id);
            App::getSmarty()->assign('page_title',"Recenzja");
            App::getSmarty()->display("review.tpl");
        }

    }
    
    //Usunięcie książki
    public function action_book_delete() {

        App::getMessages()->addMessage(new Message("Wywołano akcję: book_delete", Message::INFO));
       
        App::getSmarty()->display("books.tpl");
        
    }
    
    //Aktualizacja danych książki
    public function action_update_book() {

        App::getMessages()->addMessage(new Message("Wywołano akcję: book_edit", Message::INFO));
       
        App::getSmarty()->display("books.tpl");
        
    }
    
    //Wyświetlenie formularza z edycją książki
    public function action_book_edit() {

        App::getMessages()->addMessage(new Message("Wywołano akcję: book_edit", Message::INFO));
       
        App::getSmarty()->display("books.tpl");
        
    }
    
    //Wyświetlenie formularza z dodawaniem książki
    public function action_book_add() {

        App::getMessages()->addMessage(new Message("Wywołano akcję: book_add", Message::INFO));
       
        App::getSmarty()->display("books.tpl");
        
    }
    
}
