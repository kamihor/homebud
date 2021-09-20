<?php

namespace app\controllers;

use core\App;
use app\forms\TransactionEditForm;
use core\ParamUtils;
use PDOException;

class TransactionCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new TransactionEditForm();
    }

    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->amount = ParamUtils::getFromRequest('amount', true, 'Błędne wywołanie aplikacji');
        $this->form->category = ParamUtils::getFromRequest('category', true, 'Błędne wywołanie aplikacji');
        $this->form->description = ParamUtils::getFromRequest('description', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->amount))) {
            App::getMessages()->addMessage(new \core\Message("Wprowadź kwotę", \core\Message::ERROR));
        }
        if (empty(trim($this->form->category))) {
            App::getMessages()->addMessage(new \core\Message("Wprowadź kategorię", \core\Message::ERROR));
        }
        if (empty(trim($this->form->description))) {
            App::getMessages()->addMessage(new \core\Message("Wprowadź opis", \core\Message::ERROR));
        }

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function getCategories() {
        $this->categories = App::getDB()->select("category", "name");
    }

    public function action_transactionEdit() {
        if ($this->validateEdit()) {

            try {
                $record = App::getDB()->get("register", "*", [
                    "idtransaction" => $this->form->id
                ]);
                $this->form->id = $record['idtransaction'];
                $this->form->amount = $record['amount'];
                $this->form->category = $record['idcategory'];
                $this->form->description = $record['description'];
            } catch (PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas odczytu rekordu", \core\Message::ERROR));
            }
        }

        try {
            $this->getCategories();
        } catch (PDOException $e) {
            App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas odczytu rekordu", \core\Message::ERROR));
        }
        $this->generateView();
    }

    public function action_transactionNew() {
        $this->getCategories();
        $this->generateView();
    }

    public function action_transactionSave() {

        if ($this->validateSave()) {
            try {
                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    $count = App::getDB()->count("register");

                    $idcat = App::getDB()->get("category", "idcategory", ["name" => $this->form->category]);
                    $usr = unserialize($_SESSION['user']);
                    $idusr = App::getDB()->get("user", "iduser", ["username" => $usr->login]);

                    if ($count <= 1000) {
                        App::getDB()->insert("register", [
                            "amount" => $this->form->amount,
                            "iduser" => $idusr,
                            "idcategory" => $idcat,
                            "description" => $this->form->description,
                            "createdate" => date("Y-m-d H:i:sa")
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        App::getMessages()->addMessage(new \core\Message("Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis", \core\Message::INFO));
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    $idcat = App::getDB()->get("category", "idcategory", ["name" => $this->form->category]);
                    $usr = unserialize($_SESSION['user']);
                    $idusr = App::getDB()->get("user", "iduser", ["username" => $usr->login]);

                    App::getDB()->update("register", [
                        "amount" => $this->form->amount,
                        "idcategory" => intval($idcat),
                        "iduser" => intval($idusr),
                        "description" => $this->form->description,
                        "createdate" => date("Y-m-d H:i:sa")
                            ], [
                        "idtransaction" => $this->form->id
                    ]);
                }

                App::getMessages()->addMessage(new \core\Message("Pomyślnie zapisano rekord", \core\Message::INFO));
            } catch (PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Wystąpił nieoczekiwany błąd podczas zapisu rekordu", \core\Message::INFO));
            }

            App::getRouter()->forwardTo('register');
        } else {
            $this->generateView();
        }
    }

    public function action_transactionDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("register", [
                    "idtransaction" => $this->form->id
                ]);
                App::getMessages()->addMessage(new \core\Message("Pomyślnie usunięto rekord", \core\Message::INFO));
            } catch (\PDOException $e) {
                App::getMessages()->addMessage(new \core\Message("Wystąpił błąd podczas usuwania rekordu", \core\Message::ERROR));
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($e->getMessage());
                }
            }

            App::getRouter()->forwardTo('register');
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->assign('categories', $this->categories);  // lista rekordów z bazy danych
        App::getSmarty()->assign('user', unserialize($_SESSION['user']));
        App::getSmarty()->display('TransactionEdit.tpl');
    }

}
