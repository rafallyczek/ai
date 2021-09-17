<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('show_main_page');
App::getRouter()->setLoginRoute('show_login');

Utils::addRoute('show_main_page', 'MainController');

Utils::addRoute('show_login', 'LoginController');
Utils::addRoute('login', 'LoginController');
Utils::addRoute('logout', 'LoginController');

Utils::addRoute('book_list', 'BookController');
Utils::addRoute('find_books', 'BookController');
Utils::addRoute('book_details', 'BookController');
Utils::addRoute('book_review', 'BookController', ['user','admin']);
Utils::addRoute('add_review', 'BookController', ['user','admin']);
Utils::addRoute('book_insert', 'BookController', ['admin']);
Utils::addRoute('add_book', 'BookController', ['admin']);
Utils::addRoute('delete_book', 'BookController', ['admin']);
Utils::addRoute('book_edit', 'BookController', ['admin']);
Utils::addRoute('update_book', 'BookController', ['admin']);