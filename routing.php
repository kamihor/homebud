<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('register'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('register', 'RegisterCtrl',["admin","user"]);
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');