<?php
require_once dirname(__FILE__).'/../../config.php';

session_start();
session_destroy();

header("Location: ".$config->app_url);