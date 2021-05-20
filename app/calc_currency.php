<?php
require_once dirname(__FILE__).'/../config.php';

require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

include _ROOT_PATH.'/app/security/guard.php';

function getParams(&$form){
    $form['amount'] = isset($_REQUEST ['amount']) ? $_REQUEST ['amount'] : null;
    $form['currency'] = isset($_REQUEST ['currency']) ? $_REQUEST ['currency'] : null;
}

function validate(&$form,&$messages){
    
    if(!(isset($form['amount']) && isset($form['currency']))) {
	return false;
    }
    
    if($form['amount'] == "") {
	$messages [] = 'Nie podano kwoty.';
        return false;
    }
    
    if(!is_numeric($form['amount'])){
        $messages [] = 'Kwota nie jest liczbą.';
        return false;
    }
    
    return true;
    
}

function process(&$form,&$result){
    
    $form['amount'] = floatval($form['amount']);
	
    switch ($form['currency']) {
	case 'USD' :
            $result = $form['amount'] * 0.27;
            break;
	case 'JPY' :
            $result = $form['amount'] * 28.88;
            break;
	case 'GBP' :
            $result = $form['amount'] * 0.19;
            break;
	default :
            $result = $form['amount'] * 0.22;
            break;
    }
    
}

//KONTROLER:

$form = array();
$result = null;
$messages = array();

getParams($form);
if(validate($form, $messages)){
    process($form, $result);
}

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('app_root',_APP_ROOT);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator walut');
$smarty->assign('page_description','Zamiana kwot w PLN na inne waluty.');

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);

$smarty->display(_ROOT_PATH.'/app/calc_currency.tpl');