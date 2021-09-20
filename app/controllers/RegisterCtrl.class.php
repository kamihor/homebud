<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use app\forms\RegisterSearchForm;

class RegisterCtrl {

    private $form;
    private $page;

    public function __construct() {
        $this->form = new RegisterSearchForm();
    }

    public function validate() {
        $this->form->name = ParamUtils::getFromRequest('name');
        $this->form->day = ParamUtils::getFromRequest('day');
        $this->form->month = ParamUtils::getFromRequest('month');
        $this->form->year = ParamUtils::getFromRequest('year');
        $this->page = ParamUtils::getFromCleanURL(1, true);
        return !App::getMessages()->isError();
    }

    public function action_register() {

        $this->validate();

        //utworzenie zmiennej date o formacie odpowiadajacym dacie w bazie danych
        //gdy podano tylko rok, wyświetlamy wszystkie rekordy z danego roku
        if (isset($this->form->month) && strlen($this->form->month) > 0) {
            $date = $this->form->year . "-" . $this->form->month . "-" . $this->form->day;
        } else {
            $date = $this->form->year . "-";
        }

        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)

        if (isset($this->form->name) && strlen($this->form->name) > 0) {
            $search_params['username[~]'] = $this->form->name . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        if (isset($date) && strlen($date) > 2) {
            $search_params['createdate[~]'] = $date . '%';
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }

        //unikniecie ujemnego nr strony dla stronnicowania
        if ($this->page < 1) {
            $this->page = 0;
        }

        //obliczenie gornego limitu stron dla stronnicowania
        $pagenr = $this->data = App::getDB()->count("register", "idtransaction") / 10;
        if ($this->page > $pagenr) {
            $this->page = intval($pagenr);
        }

        $limit = [$this->page * 10, 10];

        //dwa tryby wyświetlania rekordów - gdy podano parametr wyszukiwania, brak stronnicowania,
        // w pozostałych przypadkach stronnicujemy
        if ($num_params > 0) {
            $this->data = App::getDB()->select("register", [
                "[>]user" => ["iduser" => "iduser"],
                "[>]category" => ["idcategory" => "idcategory"]
                    ], [
                "register.idtransaction",
                "register.amount",
                "user.username",
                "category.name",
                "register.description",
                "register.createdate"
                    ],
                    $where
            );
        } else {
            $this->data = App::getDB()->select("register", [
                "[>]user" => ["iduser" => "iduser"],
                "[>]category" => ["idcategory" => "idcategory"]
                    ], [
                "register.idtransaction",
                "register.amount",
                "user.username",
                "category.name",
                "register.description",
                "register.createdate"
                    ], [
                'LIMIT' => $limit,
                'ORDER' => ["createdate" => "DESC"],
            ]);
        }

        $this->generateView();
    }

    public function generateView() {

        App::getSmarty()->assign('data', $this->data);  // lista rekordów z bazy danych
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->assign('p', $this->page);
        App::getSmarty()->assign('user', unserialize($_SESSION['user']));
        App::getSmarty()->display("Register.tpl");
    }

}
