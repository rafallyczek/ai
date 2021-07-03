<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('book_list'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

//No roles for test purposes
Utils::addRoute('login', 'LoginController');
Utils::addRoute('logout', 'LoginController');

Utils::addRoute('book_list', 'BookListController'); //['user','admin']
Utils::addRoute('book_details', 'BookListController'); //['user','admin']
Utils::addRoute('book_review', 'BookListController'); //['user','admin']
Utils::addRoute('book_delete', 'BookListController'); //['admin']
Utils::addRoute('book_edit', 'BookListController'); //['admin'
Utils::addRoute('book_add', 'BookListController'); //['admin']
//Utils::addRoute('action_name', 'controller_class_name');