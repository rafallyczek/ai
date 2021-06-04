<?php
session_start();

$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

if(empty($role)){
    $action = 'login';
}