<?php
require_once dirname(__FILE__).'/../../config.php';

require_once $config->root_path.'/app/security/LoginController.class.php';

$controller = new LoginController();
$controller->processLogin();