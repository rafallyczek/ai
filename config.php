<?php
require_once 'Config.class.php';

$config = new Config();

$config->server_name = 'localhost';
$config->server_url = 'http://'.$config->server_name;
$config->app_root = '/ai';
$config->app_url = $config->server_url.$config->app_root;
$config->root_path = dirname(__FILE__);