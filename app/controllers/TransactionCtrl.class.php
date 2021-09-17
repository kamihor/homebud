<?php

namespace app\controllers;

use core\App;
use app\forms\TransactionEditForm;
use app\transfer\User;
use core\ParamUtils;
use core\Validator;
use DateTime;
use PDOException;

class TransactionCtrl {

	private $form; //dane formularza

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new TransactionEditForm();
	}

	//validacja danych przed zapisem (nowe dane lub edycja)
	public function validateSave() {
		//0. Pobranie parametrów z walidacją
                $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
		$this->form->amount = ParamUtils::getFromRequest('amount',true,'Błędne wywołanie aplikacji');
		$this->form->category = ParamUtils::getFromRequest('category',true,'Błędne wywołanie aplikacji');
		$this->form->description = ParamUtils::getFromRequest('description',true,'Błędne wywołanie aplikacji');
    
                
		if ( App::getMessages()->isError () ) return false;

		// 1. sprawdzenie czy wartości wymagane nie są puste
		if (empty(trim($this->form->amount))) {
                    App::getMessages()->addMessage (new \core\Message("Wprowadź kwotę", \core\Message::ERROR ));
		}
		if (empty(trim($this->form->category))) {
                    App::getMessages()->addMessage (new \core\Message("Wprowadź kategorię", \core\Message::ERROR ));

		}
		if (empty(trim($this->form->description))) {
                    App::getMessages()->addMessage (new \core\Message("Wprowadź opis", \core\Message::ERROR ));
		}

		if ( App::getMessages()->isError () ) return false;
			
		return ! App::getMessages()->isError ();
	}

	//validacja danych przed wyswietleniem do edycji
	public function validateEdit() {
		//pobierz parametry na potrzeby wyswietlenia danych do edycji
		//z widoku listy osób (parametr jest wymagany)
		$this->form->id = ParamUtils::getFromCleanURL(1,true,'Błędne wywołanie aplikacji');
		return ! App::getMessages()->isError ();
	}
	
        public function getCategories(){
            $this->categories= App::getDB()->select("category","name");
        }
	
	//wysiweltenie rekordu do edycji wskazanego parametrem 'id'
	public function action_transactionEdit(){
		if ( $this->validateEdit() ){
                    
			try {
				// 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
				$record = App::getDB()->get("register", "*",[
					"idtransaction" => $this->form->id
				]);
				// 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                                $this->form->id = $record['idtransaction'];
				$this->form->amount = $record['amount'];
				$this->form->category = $record['idcategory'];
				$this->form->description = $record['description'];
                                
			} catch (PDOException $e){
                                App::getMessages()->addMessage (new \core\Message("Wystąpił błąd podczas odczytu rekordu", \core\Message::ERROR ));
			}	
		} 
                
                try {
				// 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
				$this->getCategories();
       
			} catch (PDOException $e){
                                App::getMessages()->addMessage (new \core\Message("Wystąpił błąd podczas odczytu rekordu", \core\Message::ERROR ));
			}	
	
		// 3. Wygenerowanie widoku
			    $this->generateView();        	

	}
        
        public function action_transactionNew() {
            $this->getCategories();
        $this->generateView();
    }

	public function action_transactionSave(){
			
		// 1. Walidacja danych formularza (z pobraniem)
		if ($this->validateSave()) {
			// 2. Zapis danych w bazie
			try {
				//2.1 Nowy rekord
				if ($this->form->id == '') {
					//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
					$count = App::getDB()->count("register");
                                        
                                        $idcat=App::getDB()->get("category","idcategory",["name"=> $this->form->category]);
                                        $usr=unserialize($_SESSION['user']);
                                        $idusr=App::getDB()->get("user","iduser",["username"=> $usr->login]);
                                        
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
						 App::getMessages()->addMessage (new \core\Message("Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis", \core\Message::INFO ));
                                                $this->generateView(); //pozostań na stronie edycji
						exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
					}
				} else { 
				//2.2 Edycja rekordu o danym ID
                                    
                                    
                                    $idcat=App::getDB()->get("category","idcategory",["name"=> $this->form->category]);
                                    $usr=unserialize($_SESSION['user']);
                                    $idusr=App::getDB()->get("user","iduser",["username"=> $usr->login]);
                                    
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
                                      
                                 App::getMessages()->addMessage (new \core\Message("Pomyślnie zapisano rekord", \core\Message::INFO ));
			} catch (PDOException $e){
                                App::getMessages()->addMessage (new \core\Message("Wystąpił nieoczekiwany błąd podczas zapisu rekordu", \core\Message::INFO ));	
			}
			
			// 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
			App::getRouter()->forwardTo('register');

		} else {
			// 3c. Gdy błąd walidacji to pozostań na stronie
			$this->generateView();
		}		
	}
        
        
        public function action_transactionDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("register", [
                    "idtransaction" => $this->form->id
                ]);
                App::getMessages()->addMessage (new \core\Message("Pomyślnie usunięto rekord", \core\Message::INFO ));
            } catch (\PDOException $e) {
                App::getMessages()->addMessage (new \core\Message("Wystąpił błąd podczas usuwania rekordu", \core\Message::ERROR ));
                if (App::getConf()->debug){
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('personList');
    }
        }
        
        
	
	public function generateView(){
		App::getSmarty()->assign('form',$this->form); // dane formularza dla widoku
                App::getSmarty()->assign('categories',$this->categories);  // lista rekordów z bazy danych
                App::getSmarty()->assign('user',unserialize($_SESSION['user']));
		App::getSmarty()->display('TransactionEdit.tpl');
	}
}
 