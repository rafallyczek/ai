<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator walut</title>
</head>
<style>
input, label{
	display: block;
}
.formInputs{
	margin-bottom: 5px;
}
.container{
	margin-left: 10px;
}
</style>
<body>
<div class="container">
	<h1>Kalkulator walut</h1>
	<form action="<?php print(_APP_URL);?>/app/calc_currency.php" method="post">
		<div class="formInputs">
			<label for="amount">Kwota (w PLN): </label>
			<input id="amount" type="text" name="amount" value="<?php if(isset($x))print($x); ?>" />
		</div>
		<div class="formInputs">
			<label for="currency">Waluta: </label>
			<select id="currency" name="currency">
				<option value="EUR"<?php if(isset($currency) && $currency=='EUR') print('selected'); ?>>Euro</option>
				<option value="USD"<?php if(isset($currency) && $currency=='USD') print('selected'); ?>>Dolar amerykański</option>
				<option value="JPY"<?php if(isset($currency) && $currency=='JPY') print('selected'); ?>>Jen</option>
			</select>
		</div>
		<input type="submit" value="Oblicz"/>
	</form>	

<?php

if (isset($messages)) {
	echo '<ol style="margin-top: 10px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
	foreach ( $messages as $key => $msg ) {
		echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
}
?>

<?php if (isset($result)){ ?>
<div style="margin-top: 10px; padding: 10px; border-radius: 5px; background-color: grey; width:300px;">
<?php echo $amount.' PLN to: '.$result.' '.$currency; ?>
</div>
<?php } ?>
</div>
</body>
</html>