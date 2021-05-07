<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Logowanie</title>
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
        <style>
            .green{
                background-color: rgb(28, 184, 65);
            }
        </style>
    </head>
    <body>
        <div style="margin: 5px">
            <form action="<?php print(_APP_ROOT);?>/app/security/login.php" method="post" class="pure-form pure-form-stacked">
                <legend>Logowanie</legend>
                <fieldset>
                    <label for="login">Login: </label>
                    <input id="login" type="text" name="login" value="<?php printParam($form['login']); ?>"/>
                    <label for="password">Hasło: </label>
                    <input id="password" type="text" name="password"/>  
                </fieldset>
                <input type="submit" value="Zaloguj" class="green pure-button"/>
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

        </div>
    </body>
</html>