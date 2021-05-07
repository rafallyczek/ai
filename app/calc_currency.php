<?php
require_once dirname(__FILE__).'/../config.php';

$amount = $_REQUEST ['amount'];
$currency = $_REQUEST ['currency'];

if ( ! (isset($amount) && isset($currency))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $amount == "") {
	$messages [] = 'Nie podano kwoty';
}

if (empty( $messages )) {
	
	if (! is_numeric( $amount )) {
		$messages [] = 'Kwota nie jest liczbą';
	}	

}

if (empty ( $messages )) {
	
	$amount = floatval($amount);
	
	switch ($currency) {
		case 'USD' :
			$result = $amount * 0.27;
			break;
		case 'JPY' :
			$result = $amount * 28.88;
			break;
		default :
			$result = $amount * 0.22;
			break;
	}
}

include 'calc_currency_view.php';