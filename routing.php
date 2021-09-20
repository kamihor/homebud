<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('register'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('register', 'RegisterCtrl',["admin","user"]);
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');

Utils::addRoute('transactionEdit', 'TransactionCtrl',["admin"]);
Utils::addRoute('transactionSave', 'TransactionCtrl',["admin","user"]);
Utils::addRoute('transactionDelete', 'TransactionCtrl',["admin"]);
Utils::addRoute('transactionNew', 'TransactionCtrl',["admin","user"]);

Utils::addRoute('categoryCalc', 'CategoryCtrl',["admin","user"]);
Utils::addRoute('categoryEdit', 'CategoryEditCtrl',["admin"]);
Utils::addRoute('categorySave', 'CategoryEditCtrl',["admin"]);
Utils::addRoute('categoryDelete', 'CategoryEditCtrl',["admin"]);
Utils::addRoute('categoryNew', 'CategoryEditCtrl',["admin"]);


Utils::addRoute('userDisplay', 'UserCtrl',["admin"]);
Utils::addRoute('userEdit', 'UserEditCtrl',["admin"]);
Utils::addRoute('userSave', 'UserEditCtrl',["admin"]);
Utils::addRoute('userDelete', 'UserEditCtrl',["admin"]);
Utils::addRoute('userNew', 'UserEditCtrl',["admin"]);