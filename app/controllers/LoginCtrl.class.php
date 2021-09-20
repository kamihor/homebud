<?php

namespace app\controllers;

use app\transfer\User;
use app\forms\LoginForm;
use core\ParamUtils;
use core\RoleUtils;
use core\App;

class LoginCtrl {

    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function getParams() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');
    }

    public function validate() {
        // sprawdzenie, czy parametry zostały przekazane
        if (!(isset($this->form->login) && isset($this->form->pass))) {
            // sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
            return false;
        }

        if (!App::getMessages()->isError()) {

            // sprawdzenie, czy potrzebne wartości zostały przekazane
            if ($this->form->login == "") {
                App::getMessages()->addMessage(new \core\Message("Nie podano loginu", \core\Message::ERROR));
            }
            if ($this->form->pass == "") {
                App::getMessages()->addMessage(new \core\Message("Nie podano hasła", \core\Message::ERROR));
            }
        }

        if (!App::getMessages()->isError()) {

            //sprawdzenie czy podany login i hasło istnieją w bazie danych
            if (App::getDB()->has("user", ["AND" => ["username" => $this->form->login, "password" => $this->form->pass]])) {
                $user = new User($this->form->login, App::getDB()->get("user", "role", ["username" => $this->form->login]));
                $_SESSION['user'] = serialize($user);
                RoleUtils::addRole($user->role);
            } else {
                App::getMessages()->addMessage(new \core\Message("Niepoprawny login lub hasło", \core\Message::ERROR));
            }
        }

        return !App::getMessages()->isError();
    }

    public function action_login() {

        $this->getParams();

        if ($this->validate()) {
            header("Location: " . App::getConf()->app_url . "/");
        } else {
            $this->generateView();
        }
    }

    public function action_logout() {
        session_destroy();
        App::getMessages()->addMessage(new \core\Message("Poprawnie wylogowano z systemu", \core\Message::INFO));
        $this->generateView();
    }

    public function generateView() {

        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');
    }

}
