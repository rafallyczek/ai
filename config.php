<?php
$config->server_name = 'localhost';
$config->server_url = 'http://'.$config->server_name;
$config->app_root = '/ai';
$config->app_url = $config->server_url.$config->app_root;
$config->root_path = dirname(__FILE__);
$config->action_root = $config->app_root.'/mainController.php?action=';
$config->action_url = $config->server_url.$config->action_root;
$config->db_type = 'mysql';
$config->db_server = 'localhost';
$config->db_name = 'ai';
$config->db_user = 'root';
$config->db_pass = '';
$config->db_charset = 'utf8';
$config->db_port = '3306';
$config->db_option = [ PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];