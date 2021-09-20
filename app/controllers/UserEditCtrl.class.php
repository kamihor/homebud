<?php

namespace app\controllers;

use core\App;
use app\forms\UserEditForm;
use core\ParamUtils;
use PDOException;

class UserEditCtrl {

    private $form; //dane formularza
    private $roles = ["admin", "user"];

    public function __construct() {
        $this->form = new UserEditForm();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->username = ParamUtils::getFromRequest('username', true, 'Błędne wywołanie aplikacji');
        $this->form->password = ParamUtils::getFromRequest('password', true, 'Błędne wywołanie aplikacji');
        $this->form->role = ParamUtils::getFromRequest('role', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->username))) {
            App::getMessages()->addMessage(new \core\Message("Wprowadź oczekiwaną nazwę użytkownika", \core\Message::ERROR));
        }

        if (empty(trim($this->form->password))) {
            App::getMessages()->addMessage(new \core\Message("Wprowadź hasło", \core\Message::ERROR));
        }
        if (empty(trim($this->form->role))) {
            App::getMessages()->addMessage(new \core\Message("Wprowadź rolę", \core\Message::ERROR));
        }

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    public function action_userEdit() {
        if ($this->validateEdit()) {

            try {
                $record = App::getDB()->get("user", "*", [
                    "iduser" => $this->form->id
                ]);
                $this->form->id = $record['iduser'];
                $this->form->username = $record['username'];
                $this->form->password = $record['password'];
                $this->form->role = $record['role'];
            } catch (PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas odczytu rekordu", \core\Message::ERROR));
            }
        }

        $this->generateView();
    }

    public function getRoles() {
        $this->roles = App::getDB()->select("user", "role");
    }

    public function action_userSave() {

        if ($this->validateSave()) {
            try {
                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    $count = App::getDB()->count("user");
                    if ($count <= 1000) {
                        App::getDB()->insert("user", [
                            "username" => $this->form->username,
                            "password" => $this->form->password,
                            "role" => $this->form->role,
                            "create_time" => date("Y-m-d H:i:sa")
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        App::getMessages()->addMessage(new \core\Message("Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis", \core\Message::INFO));
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID

                    App::getDB()->update("user", [
                        "username" => $this->form->username,
                        "password" => $this->form->password,
                        "role" => $this->form->role,
                        "create_time" => date("Y-m-d H:i:sa")
                            ], [
                        "iduser" => $this->form->id
                    ]);
                }

                App::getMessages()->addMessage(new \core\Message("Pomyślnie zapisano rekord", \core\Message::INFO));
            } catch (PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Wystąpił nieoczekiwany błąd podczas zapisu rekordu", \core\Message::INFO));
            }

            App::getRouter()->forwardTo('userDisplay');
        } else {
            $this->generateView();
        }
    }

    public function action_userNew() {
        $this->generateView();
    }

    public function action_userDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("user", [
                    "iduser" => $this->form->id
                ]);
                App::getMessages()->addMessage(new \core\Message("Pomyślnie usunięto rekord", \core\Message::INFO));
            } catch (\PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Użytkownik posiada przypisane transakcje", \core\Message::ERROR));
            }

            App::getRouter()->forwardto("userDisplay");
        }
    }

    public function action_userEditDisplay() {

        $this->data = App::getDB()->select("user", "*");

        $this->generateView();
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->assign('roles', $this->roles);  // lista rekordów z bazy danych
        App::getSmarty()->assign('user', unserialize($_SESSION['user']));
        App::getSmarty()->display("UserEdit.tpl");
    }

}
