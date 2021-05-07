<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <title>Kalkulator walut</title>
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
        <style>
            .red{
                background-color: rgb(202, 60, 60);
            }
            .green{
                background-color: rgb(28, 184, 65);
            }
        </style>
    </head>
    <body>
        <div style="margin: 5px">
            <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="red pure-button">Wyloguj</a>
        </div>
        <div style="margin: 5px">
            <form action="<?php print(_APP_ROOT);?>/app/calc_currency.php" method="post" class="pure-form pure-form-stacked">
                <legend>Kalkulator walut</legend>
                <fieldset>
                    <label for="amount">Kwota (w PLN): </label>
                    <input id="amount" type="text" name="amount" value="<?php printParam($form['amount']); ?>"/>
                    <label for="currency">Waluta: </label>
                        <select id="currency" name="currency">
                            <option value="EUR"<?php if(isset($form['currency']) && $form['currency']=='EUR') print('selected'); ?>>Euro</option>
                            <option value="USD"<?php if(isset($form['currency']) && $form['currency']=='USD') print('selected'); ?>>Dolar amerykański</option>
                            <option value="JPY"<?php if(isset($form['currency']) && $form['currency']=='JPY') print('selected'); ?>>Jen</option>
                            <option value="GBP"<?php if(isset($form['currency']) && $form['currency']=='GBP') print('selected'); ?>>Brytyjski funt szterling</option>
                        </select>
                </fieldset>
                <input type="submit" value="Oblicz" class="green pure-button"/>
            </form>	

            <?php
            if (isset($messages)) {
                if(count($messages)>0){
                    echo '<ol style="margin-top: 10px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
                    foreach ( $messages as $key => $msg ) {
                            echo '<li>'.$msg.'</li>';
                    }
                    echo '</ol>';
                }
            }
            ?>

            <?php if (isset($result)){ ?>
            <div style="margin-top: 10px; padding: 10px; border-radius: 5px; background-color: grey; width:300px;">
            <?php echo $form['amount'].' PLN to: '.$result.' '.$form['currency']; ?>
            </div>
            <?php } ?>
        </div>
    </body>
</html>