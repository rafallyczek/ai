<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('show_main_page');
App::getRouter()->setLoginRoute('show_login');

Utils::addRoute('show_main_page', 'MainController');

Utils::addRoute('show_login', 'LoginController');
Utils::addRoute('login', 'LoginController');
Utils::addRoute('logout', 'LoginController');

Utils::addRoute('book_list', 'BookListController', ['user','admin']);
Utils::addRoute('book_details', 'BookListController', ['user','admin']);
Utils::addRoute('book_review', 'BookListController', ['user','admin']);
Utils::addRoute('book_delete', 'BookListController', ['admin']);
Utils::addRoute('book_edit', 'BookListController', ['admin']);
Utils::addRoute('book_add', 'BookListController', ['admin']);