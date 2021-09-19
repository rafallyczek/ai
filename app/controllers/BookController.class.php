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

        $page = ParamUtils::getFromCleanURL(1);
        $book_count = App::getDB()->count("books", "*");
        $max_page = ceil($book_count/5);
        $books = App::getDB()->select("books", "*", [ "LIMIT" => [5*($page-1),5] ]);
        App::getMessages()->addMessage(new Message("Ilość wyników: ".$book_count, Message::INFO));
        App::getSmarty()->assign("books",$books);
        App::getSmarty()->assign("page",$page);
        App::getSmarty()->assign("max_page",$max_page);
        App::getSmarty()->assign('page_title','Książki');
        App::getSmarty()->display("books.tpl");
        
    }
    
    //Znajdź książki
    public function action_find_books() {

        $page = ParamUtils::getFromPost("page");
        $title = ParamUtils::getFromPost("title");
        $book_count = App::getDB()->count("books", "*", [ "title[~]" => $title ]);
        $max_page = ceil($book_count/5);
        $books = App::getDB()->select("books", "*", [  
              "LIMIT" => [5*($page-1),5],
              "title[~]" => $title    
        ]);
        App::getMessages()->addMessage(new Message("Ilość wyników: ".$book_count, Message::INFO));
        App::getSmarty()->assign("books",$books);
        App::getSmarty()->assign("page",$page);
        App::getSmarty()->assign("max_page",$max_page);
        App::getSmarty()->assign("title",$title);
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
        
        $book_id = ParamUtils::getFromPost("book_id");
        
        $validator = new Validator();
        
        $content = $validator->validateFromRequest("content", [
            'required' => true,
            'required_message' => 'Treść jest wymagana.',
            'min_length' => 1,
            'validator_message' => 'Nie wprowadzono żadnych znaków.',
        ]);
       
        if(!$validator->isLastOK()){
            App::getSmarty()->assign("book_id",$book_id);
            App::getSmarty()->assign('page_title',"Recenzja");
            App::getSmarty()->display("review.tpl");
            exit();
        }
        
        $user = SessionUtils::load("logged_user",true);
        $score = ParamUtils::getFromPost("score");
        App::getDB()->insert("reviews", [
            "score" => $score,
            "description" => $content,
            "username" => $user[0]["username"],
            "user_id" => $user[0]["id"],
            "book_id" => $book_id
        ]);
        $book = App::getDB()->select("books", "*", ["id" => $book_id]);
        $reviews = App::getDB()->select("reviews", "*", ["book_id" => $book_id]);
        App::getSmarty()->assign("book",$book);
        App::getSmarty()->assign("reviews",$reviews);
        App::getSmarty()->assign('page_title',$book[0]["title"]);
        App::getSmarty()->display("book.tpl");

    }
    
    //Wyświetlenie formularza z dodawaniem książki
    public function action_book_insert() {

        App::getSmarty()->assign('page_title',"Dodaj książkę");
        App::getSmarty()->display("add_book.tpl");
        
    }
    
    //Dodanie książki
    public function action_add_book() {

        $validator = new Validator();
        
        $title = $validator->validateFromRequest("title", [
            'required' => true,
            'required_message' => 'Tytuł jest wymagany.',
            'min_length' => 1,
            'validator_message' => 'Nie wprowadzono żadnych znaków.',
        ]);
        
        if(!$validator->isLastOK()){
            App::getSmarty()->display('add_book.tpl');
            exit();
        }
        
        $author = $validator->validateFromRequest("author", [
            'required' => true,
            'required_message' => 'Autor jest wymagany.',
            'min_length' => 1,
            'validator_message' => 'Nie wprowadzono żadnych znaków.',
        ]);
        
        if(!$validator->isLastOK()){
            App::getSmarty()->display('add_book.tpl');
            exit();
        }
        
        $release_year = $validator->validateFromRequest("release_year", [
            'required' => true,
            'required_message' => 'Rok wydania jest wymagany.',
            'min_length' => 4,
            'max_length' => 4,
            'int' => true,
            'validator_message' => 'Rok wydania powinien składać się z 4 cyfr całkiowitych.',
        ]);
        
        if(!$validator->isLastOK()){
            App::getSmarty()->display('add_book.tpl');
            exit();
        }
        
        $picture = $validator->validateFromRequest("picture", [
            'required' => true,
            'required_message' => 'Link do okładki jest wymagany.',
            'min_length' => 1,
            'validator_message' => 'Nie wprowadzono żadnych znaków.',
        ]);
        
        if(!$validator->isLastOK()){
            App::getSmarty()->display('add_book.tpl');
            exit();
        }
        
        $description = $validator->validateFromRequest("description", [
            'required' => true,
            'required_message' => 'Opis jest wymagany.',
            'min_length' => 1,
            'validator_message' => 'Nie wprowadzono żadnych znaków.',
        ]);
        
        if(!$validator->isLastOK()){
            App::getSmarty()->display('add_book.tpl');
            exit();
        }
        
        $ebook = ParamUtils::getFromPost("ebook");
        
        App::getDB()->insert("books", [
                "title" => $title,
                "author" => $author,
                "description" => $description,
                "release_year" => $release_year,
                "picture" => $picture,
                "e_book" => $ebook
            ]);
        
        App::getRouter()->redirectTo('book_list');
        
    }
    
    //Usunięcie książki
    public function action_delete_book() {

        $id = ParamUtils::getFromCleanURL(1);
        App::getDB()->delete("books", ["id" => $id]);
        App::getRouter()->redirectTo('book_list');
        
    }
    
    //Wyświetlenie formularza z edycją książki
    public function action_book_edit() {

        $id = ParamUtils::getFromCleanURL(1);
        $book = App::getDB()->select("books", "*", ["id" => $id]);
        App::getSmarty()->assign("book",$book);
        App::getSmarty()->assign('page_title',"Edytuj książkę");
        App::getSmarty()->display("edit_book.tpl");
        
    }
    
    //Aktualizacja danych książki
    public function action_update_book() {

        $id = ParamUtils::getFromPost("book_id");
        
        $validator = new Validator();
        
        $title = $validator->validateFromRequest("title", [
            'required' => true,
            'required_message' => 'Tytuł jest wymagany.',
            'min_length' => 1,
            'validator_message' => 'Nie wprowadzono żadnych znaków.',
        ]);
        
        if(!$validator->isLastOK()){
            $book = App::getDB()->select("books", "*", ["id" => $id]);
            App::getSmarty()->assign("book",$book);
            App::getSmarty()->display('edit_book.tpl');
            exit();
        }
        
        $author = $validator->validateFromRequest("author", [
            'required' => true,
            'required_message' => 'Autor jest wymagany.',
            'min_length' => 1,
            'validator_message' => 'Nie wprowadzono żadnych znaków.',
        ]);
        
        if(!$validator->isLastOK()){
            $book = App::getDB()->select("books", "*", ["id" => $id]);
            App::getSmarty()->assign("book",$book);
            App::getSmarty()->display('edit_book.tpl');
            exit();
        }
        
        $release_year = $validator->validateFromRequest("release_year", [
            'required' => true,
            'required_message' => 'Rok wydania jest wymagany.',
            'min_length' => 4,
            'max_length' => 4,
            'int' => true,
            'validator_message' => 'Rok wydania powinien składać się z 4 cyfr całkiowitych.',
        ]);
        
        if(!$validator->isLastOK()){
            $book = App::getDB()->select("books", "*", ["id" => $id]);
            App::getSmarty()->assign("book",$book);
            App::getSmarty()->display('edit_book.tpl');
            exit();
        }
        
        $picture = $validator->validateFromRequest("picture", [
            'required' => true,
            'required_message' => 'Link do okładki jest wymagany.',
            'min_length' => 1,
            'validator_message' => 'Nie wprowadzono żadnych znaków.',
        ]);
        
        if(!$validator->isLastOK()){
            $book = App::getDB()->select("books", "*", ["id" => $id]);
            App::getSmarty()->assign("book",$book);
            App::getSmarty()->display('edit_book.tpl');
            exit();
        }
        
        $description = $validator->validateFromRequest("description", [
            'required' => true,
            'required_message' => 'Opis jest wymagany.',
            'min_length' => 1,
            'validator_message' => 'Nie wprowadzono żadnych znaków.',
        ]);
        
        if(!$validator->isLastOK()){
            $book = App::getDB()->select("books", "*", ["id" => $id]);
            App::getSmarty()->assign("book",$book);
            App::getSmarty()->display('edit_book.tpl');
            exit();
        }
        
        $ebook = ParamUtils::getFromPost("ebook");
        
        App::getDB()->update("books", [
                "title" => $title,
                "author" => $author,
                "description" => $description,
                "release_year" => $release_year,
                "picture" => $picture,
                "e_book" => $ebook
            ],[
                "id" => $id
        ]);
        
        App::getRouter()->redirectTo('book_list');
        
    }
    
}
