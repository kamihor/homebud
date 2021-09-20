<?php

namespace app\controllers;

use core\App;

class UserCtrl {

    public function action_userDisplay() {

        $this->data = App::getDB()->select("user", "*");

        $this->generateView();
    }

    public function generateView() {

        App::getSmarty()->assign('data', $this->data);  // lista rekordów z bazy danych
        App::getSmarty()->assign('user', unserialize($_SESSION['user']));
        App::getSmarty()->display("User.tpl");
    }

}
