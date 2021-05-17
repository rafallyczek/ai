<?php
require_once dirname(__FILE__).'/../../config.php';
?>
<!--
	Escape Velocity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Logowanie</title>
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
		<h1>Logowanie</h1>
		<p>Zaloguj się do aplikacji.</p>
            </div>

	</section>

	<!-- Footer -->
	<section id="footer" class="wrapper">
            <div class="title">Logowanie</div>
		<div class="container">
                    <div class="row">
			<div class="col-12 col-12-medium">

                            <!-- Form -->
				<section>
                                    <form method="post" action="<?php print(_APP_ROOT);?>/app/security/login.php">
					<div class="row gtr-50">
                                            <div class="col-6 col-12-small">
                                                <label for="login">Login: </label>
						<input type="text" name="login" id="login" placeholder="Login" />
                                                <label for="login">Hasło: </label>
						<input type="text" name="password" id="password" placeholder="Hasło" />
                                            </div>
                                            <div class="col-6 col-12-small">
                                               <?php
                                                if (isset($messages)) {
                                                    if(count($messages)>0){
                                                ?>
                                                        <label for="error">Info: </label>
                                                        <ol id="error" style="margin-top: 10px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: rgb(140, 38, 38); color:#fff; width:300px;">
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
                                            </div>
                                            <div class="col-12">
						<ul class="actions">
                                                    <li><input type="submit" class="green" value="Zaloguj" /></li>
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