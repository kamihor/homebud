<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('register'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('register', 'RegisterCtrl',["admin","user"]);
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
Utils::addRoute('transactionEdit', 'TransactionCtrl',["admin","user"]);
Utils::addRoute('transactionSave', 'TransactionCtrl',["admin","user"]);
Utils::addRoute('transactionDelete', 'TransactionCtrl',["admin","user"]);
Utils::addRoute('transactionDelete', 'TransactionCtrl',["admin","user"]);
Utils::addRoute('transactionNew', 'TransactionCtrl',["admin","user"]);
