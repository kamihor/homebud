<?php

namespace app\controllers;

use core\App;


class CategoryCtrl {

    public function action_categoryCalc() {

        //pobranie wszystkich id kategorii w celu zsumowania wydatków w danej kategorii
        $this->ids = App::getDB()->select("category", "idcategory");

        foreach ($this->ids as $values) {
            
            //suma wydatków dla poszczególnej kategorii
            $amount = App::getDB()->sum("register", ["amount"], [
                "idcategory" => $values
            ]);

            //różnica pomiędzy wartością wydatków oczekiwaną a aktualną
            $diff1 = App::getDB()->get("category", "expectedamount", ["idcategory" => $values]);
            $diff2 = App::getDB()->get("category", "currentamount", ["idcategory" => $values]);
            $diff = $diff1 - $diff2;

            App::getDB()->update("category", [
                "currentamount" => $amount,
                "diffamount" => $diff
                    ], [
                "idcategory" => $values
            ]);
        }
        $this->categoryDisplay();
    }

    public function categoryDisplay() {

        $this->data = App::getDB()->select("category", "*");

        $this->generateView();
    }

    public function generateView() {

        App::getSmarty()->assign('data', $this->data);  // lista rekordów z bazy danych
        App::getSmarty()->assign('user', unserialize($_SESSION['user']));
        App::getSmarty()->display("Category.tpl");
    }

}
