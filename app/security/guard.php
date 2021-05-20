<?php
session_start();

$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

if(empty($role)){
    include $config->root_path.'/app/security/login.php';
    exit();
}