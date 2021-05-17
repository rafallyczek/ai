<!--
	Escape Velocity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Kalkulator walut</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php print(_APP_ROOT); ?>/css/main.css" />
    <link rel="stylesheet" href="<?php print(_APP_ROOT); ?>/css/my-styles.css" />
</head>
<body class="homepage is-preload">
    <div id="page-wrapper">

        <!-- Header -->
	<section id="header" class="wrapper">

            <!-- Logo -->
            <div id="logo">
		<h1>Kalkulator walut</h1>
		<p>Zamiana kwot w PLN na inne waluty.</p>
            </div>
            
            <!-- Nav -->
            <nav id="nav">
		<ul class="red">
                    <li class="current"><a href="<?php print(_APP_ROOT); ?>/app/security/logout.php">Wyloguj</a></li>
		</ul>
            </nav>

	</section>

	<section id="footer" class="wrapper">
            <div class="title">Kalkulator</div>
		<div class="container">
                    <div class="row">
			<div class="col-12 col-12-medium">

                            <!-- Form -->
                            <section>
				<form method="post" action="<?php print(_APP_ROOT);?>/app/calc_currency.php">
                                    <div class="row gtr-50">
					<div class="col-6 col-12-small">
                                            <label for="amount">Kwota: </label>
                                            <input type="text" name="amount" id="amount" placeholder="PLN" />
                                            <label for="currency">Waluta: </label>
                                            <select id="currency" name="currency">
                                                <option value="EUR"<?php if(isset($form['currency']) && $form['currency']=='EUR') print('selected'); ?>>Euro</option>
                                                <option value="USD"<?php if(isset($form['currency']) && $form['currency']=='USD') print('selected'); ?>>Dolar amerykański</option>
                                                <option value="JPY"<?php if(isset($form['currency']) && $form['currency']=='JPY') print('selected'); ?>>Jen</option>
                                                <option value="GBP"<?php if(isset($form['currency']) && $form['currency']=='GBP') print('selected'); ?>>Brytyjski funt szterling</option>
                                            </select>
					</div>
					<div class="col-6 col-12-small">
                                            <?php
                                            if (isset($messages)) {
                                                if(count($messages)>0){
                                            ?>        
                                                    <label for="error">Wynik: </label>
                                                    <ol id="error" style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: rgb(140, 38, 38); color:#fff; width:300px;">
                                            <?php            
                                                    foreach ( $messages as $key => $msg ) {
                                                        echo '<li>'.$msg.'</li>';
                                                    }
                                            ?>        
                                                    </ol>
                                            <?php        
                                                }
                                            }
                                            ?>
                                            
                                            <?php if (isset($result)){ ?>
                                            <label for="result">Wynik: </label>        
                                            <div id="result" style="padding: 10px; border-radius: 5px; background-color: #4d94ff; color:#fff; width:300px;">
                                            <?php echo $form['amount'].' PLN to: '.$result.' '.$form['currency']; ?>
                                            </div>
                                            <?php } ?>
					</div>
					<div class="col-6 col-12-small">
                                            <ul class="actions">
						<li><input type="submit" class="green" value="Oblicz" /></li>
                                            </ul>
					</div>
                                    </div>
				</form>
                            </section>

			</div>
                    </div>
                    <div id="copyright">
			<ul>
                            <li>&copy; Rafał Łyczek.</li><li>Projekt szablonu: <a href="http://html5up.net">HTML5 UP</a></li>
			</ul>
                    </div>
		</div>
	</section>
    </div>
</body>
</html>