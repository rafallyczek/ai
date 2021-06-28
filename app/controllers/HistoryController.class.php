<?php
namespace app\controllers;

use PDOException;

class HistoryController{
    
    private $result;
    
    public function action_history(){
        
        try{
            $database = getDatabase();
            $this->result = $database->select("wynik", [
                "kwota",
                "waluta",
                "wynik",
                "user",
                "data"
            ],[
                "ORDER" => "data"
            ]);
        } catch (PDOException $ex) {
            getMessages()->addError("Błąd bazy danych: ".$ex->getMessage());
        }
        
        $this->generateView();
        
    }
    
    public function generateView(){
        getSmarty()->assign('page_title','Historia');
        getSmarty()->assign('page_description','Historia korzystania z kalkulatora.');
        
        getSmarty()->assign('result',$this->result);
        
        getSmarty()->display('history.tpl');
    }
    
}