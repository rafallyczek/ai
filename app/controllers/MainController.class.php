<?php

namespace app\controllers;

use core\App;
use core\Message;

class MainController{
    
    public function action_show_main_page() {
        
        App::getSmarty()->assign('page_title','Strona główna');
        App::getSmarty()->display("main.tpl");
        
    }
    
}
