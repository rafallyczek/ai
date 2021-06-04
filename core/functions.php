<?php
function getRequestParameter($name){
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}