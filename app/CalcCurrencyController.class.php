<?php

require_once $config->root_path.'/lib/smarty/Smarty.class.php';
require_once $config->root_path.'/lib/Messages.class.php';
require_once $config->root_path.'/app/CalcCurrencyForm.class.php';

class CalcCurrencyController{
    
    private $form;
    private $result;
    private $messages;
    
    public function __construct(){
        $this->form = new CalcCurrencyForm();
        $this->result = null;
        $this->messages = new Messages();  
    }
        
    public function getParams(){
        $this->form->amount = isset($_REQUEST ['amount']) ? $_REQUEST ['amount'] : null;
        $this->form->currency = isset($_REQUEST ['currency']) ? $_REQUEST ['currency'] : null;
    }    
    
    public function validate(){
        if(!(isset($this->form->amount) && isset($this->form->currency))) {
            return false;
        }
    
        if($this->form->amount == "") {
            $this->messages->addError('Nie podano kwoty.');
            return false;
        }
    
        if(!is_numeric($this->form->amount)){
            $this->messages->addError('Kwota nie jest liczbą.');
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
        global $config;
        
        $smarty = new Smarty();

        $smarty->assign('config',$config);
        $smarty->assign('page_title','Kalkulator walut');
        $smarty->assign('page_description','Zamiana kwot w PLN na inne waluty.');

        $smarty->assign('form',$this->form);
        $smarty->assign('result',$this->result);
        $smarty->assign('messages',$this->messages);

        $smarty->display($config->root_path.'/app/calc_currency.tpl');
    }
    
}