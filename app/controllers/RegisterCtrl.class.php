<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

/**
 * HelloWorld built in Amelia - sample controller
 *
 * @author Przemysław Kudłacik
 */
class RegisterCtrl {
    
    public function action_register() {
		        
        $this->data=App::getDB()->select("register",[
            "[>]user" => ["iduser" => "iduser"],
            "[>]category" => ["idcategory" => "idcategory"]
        ],[
            "register.idtransaction",
            "register.amount",
            "user.username",
            "category.name",
            "register.description",
            "register.createdate"
        ]);

        
 //        $this->data=App::getDB()->select("register",["idtransaction","amount","iduser","idcategory","description","createdate"]);
        
        $this->generateView();
        
    }
    
    public function generateView(){                
        
        App::getSmarty()->assign('data',$this->data);  // lista rekordów z bazy danych
        App::getSmarty()->assign('user',unserialize($_SESSION['user']));
        App::getSmarty()->display("Register.tpl");
             
    }
    
}
