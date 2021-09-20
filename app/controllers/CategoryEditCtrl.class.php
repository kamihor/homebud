<?php

namespace app\controllers;

use core\App;
use app\forms\CategoryEditForm;
use core\ParamUtils;
use PDOException;


class CategoryEditCtrl {

    private $form; //dane formularza

    public function __construct() {
        $this->form = new CategoryEditForm();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->expectedamount = ParamUtils::getFromRequest('expectedamount', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->expectedamount))) {
            App::getMessages()->addMessage(new \core\Message("Wprowadź oczekiwaną kwotę", \core\Message::ERROR));
        }
        if (empty(trim($this->form->name))) {
            App::getMessages()->addMessage(new \core\Message("Wprowadź nazwę kategorii", \core\Message::ERROR));
        }

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    public function action_categoryEdit() {
        if ($this->validateEdit()) {

            try {
                $record = App::getDB()->get("category", "*", [
                    "idcategory" => $this->form->id
                ]);
                $this->form->id = $record['idcategory'];
                $this->form->name = $record['name'];
                $this->form->expectedamount = $record['expectedamount'];
            } catch (PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas odczytu rekordu", \core\Message::ERROR));
            }
        }

        $this->generateView();
    }

    public function action_categorySave() {

        if ($this->validateSave()) {
            try {
                if ($this->form->id == '') {
                    $count = App::getDB()->count("category");
                    if ($count <= 1000) {
                        App::getDB()->insert("category", [
                            "name" => $this->form->name,
                            "expectedamount" => $this->form->expectedamount,
                        ]);
                    } else { 
                        // Gdy za dużo rekordów to pozostań na stronie
                        App::getMessages()->addMessage(new \core\Message("Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis", \core\Message::INFO));
                        $this->generateView(); //pozostań na stronie edycji
                        exit();
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("category", [
                        "name" => $this->form->name,
                        "expectedamount" => $this->form->expectedamount,
                            ], [
                        "idcategory" => $this->form->id
                    ]);
                }
                App::getMessages()->addMessage(new \core\Message("Pomyślnie zapisano rekord", \core\Message::INFO));
            } catch (PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Wystąpił nieoczekiwany błąd podczas zapisu rekordu", \core\Message::INFO));
            }

            App::getRouter()->forwardTo('categoryCalc');
        } else {
            $this->generateView();
        }
    }

    public function action_categoryNew() {
        $this->generateView();
    }

    public function action_categoryDelete() {
        if ($this->validateEdit()) {
            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("category", [
                    "idcategory" => $this->form->id
                ]);
                App::getMessages()->addMessage(new \core\Message("Pomyślnie usunięto rekord", \core\Message::INFO));
            } catch (\PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Kategoria jest wykorzystywana", \core\Message::ERROR));
            }

        }
        App::getRouter()->forwardto("categoryCalc");
    }

    public function action_categoryEditDisplay() {

        $this->data = App::getDB()->select("category", "*");

        $this->generateView();
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->assign('user', unserialize($_SESSION['user']));
        App::getSmarty()->display("CategoryEdit.tpl");
    }

}
