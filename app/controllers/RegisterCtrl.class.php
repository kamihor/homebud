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
            "[>]user"=>["idtransaction"=>"iduser"],
            "[>]category"=>["idtransaction"=>"idcategory"]
        ],[
            "register.idtransaction",
            "register.amount",
            "user.username",
            "category.name",
            "register.description",
            "register.createdate"
        ]);

        $this->generateView();
        
    }
    
    public function generateView(){                
        
        App::getSmarty()->assign('data',$this->data);  // lista rekordów z bazy danych
        App::getSmarty()->assign('user',unserialize($_SESSION['user']));
        App::getSmarty()->display("Register.tpl");
             
    }
    
}
