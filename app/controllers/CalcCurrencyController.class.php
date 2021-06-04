<?php
namespace app\controllers;

use app\forms\CalcCurrencyForm;

class CalcCurrencyController{
    
    private $form;
    private $result;
    
    public function __construct(){
        $this->form = new CalcCurrencyForm();
        $this->result = null; 
    }
        
    public function getParams(){
        $this->form->amount = getRequestParameter('amount');
        $this->form->currency = getRequestParameter('currency');
    }    
    
    public function validate(){
        if(!(isset($this->form->amount) && isset($this->form->currency))) {
            return false;
        }
    
        if($this->form->amount == "") {
            getMessages()->addError('Nie podano kwoty.');
            return false;
        }
    
        if(!is_numeric($this->form->amount)){
            getMessages()->addError('Kwota nie jest liczbą.');
            return false;
        }
    
        return true;
    }
    
    public function process(){
        
        $this->getParams();
        
        if($this->validate()){
            
            $this->form->amount = floatval($this->form->amount);
            
            switch ($this->form->currency) {
                case 'USD' :
                    $this->result = $this->form->amount * 0.27;
                    break;
                case 'JPY' :
                    $this->result = $this->form->amount * 28.88;
                    break;
                case 'GBP' :
                    $this->result = $this->form->amount * 0.19;
                    break;
                default :
                    $this->result = $this->form->amount * 0.22;
                    break;
            }
            
        }
        
        $this->generateView();
        
    }
    
    public function generateView(){
        getSmarty()->assign('page_title','Kalkulator walut');
        getSmarty()->assign('page_description','Zamiana kwot w PLN na inne waluty.');

        getSmarty()->assign('form',$this->form);
        getSmarty()->assign('result',$this->result);

        getSmarty()->display('calc_currency.tpl');
    }
    
}