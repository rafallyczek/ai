<?php
$config->server_name = 'localhost';
$config->server_url = 'http://'.$config->server_name;
$config->app_root = '/ai';
$config->app_url = $config->server_url.$config->app_root;
$config->root_path = dirname(__FILE__);
$config->action_root = $config->app_root.'/mainController.php?action=';
$config->action_url = $config->server_url.$config->action_root;