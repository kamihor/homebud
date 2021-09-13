<?php

namespace app\controllers;

use app\transfer\User;
use app\forms\LoginForm;
use core\ParamUtils;
use core\RoleUtils;
use core\App;

class LoginCtrl{
	private $form;
	
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new LoginForm();
	}
	
	public function getParams(){
		// 1. pobranie parametrów
		$this->form->login = ParamUtils::getFromRequest('login');
		$this->form->pass = ParamUtils::getFromRequest('pass');
	}
	
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->login ) && isset ( $this->form->pass ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false;
		}
			
			// nie ma sensu walidować dalej, gdy brak parametrów
		if (!App::getMessages()->isError ()) {
			
			// sprawdzenie, czy potrzebne wartości zostały przekazane
			if ($this->form->login == "") {
				App::getMessages()->addMessage (new \core\Message("Nie podano loginu", \core\Message::ERROR ));
			}
			if ($this->form->pass == "") {
				App::getMessages()->addMessage (new \core\Message("Nie podano hasła", \core\Message::ERROR ));
			}
		}

		//nie ma sensu walidować dalej, gdy brak wartości
		if ( !App::getMessages()->isError () ) {
		
			// sprawdzenie, czy dane logowania poprawne
			// (takie informacje najczęściej przechowuje się w bazie danych)
                        if(App::getDB()->has("user",["AND"=>["username"=>$this->form->login,"password"=>$this->form->pass]])){

				//sesja już rozpoczęta w init.php, więc działamy ...
				$user = new User($this->form->login, App::getDB()->get("user","role",["username"=>$this->form->login]));
				// zaipsz obiekt użytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
				RoleUtils::addRole($user->role);

			} else {
				App::getMessages()->addMessage (new \core\Message("Niepoprawny login lub hasło", \core\Message::ERROR ));
			}
		}
		
		return ! App::getMessages()->isError ();
	}
	
	public function action_login(){

		$this->getParams();
		
		if ($this->validate()){
			//zalogowany => przekieruj na stronę główną, gdzie uruchomiona zostanie domyślna akcja
			header("Location: ".App::getConf()->app_url."/");
		} else {
			//niezalogowany => wyświetl stronę logowania
			$this->generateView(); 
		}
		
	}
	
	public function action_logout(){
		// 1. zakończenie sesji - tylko kończymy, jesteśmy już podłączeni w init.php
		session_destroy();
		
		// 2. wyświetl stronę logowania z informacją
		App::getMessages()->addMessage (new \core\Message("Poprawnie wylogowano z systemu", \core\Message::INFO ));

		$this->generateView();		 
	}
	
	public function generateView(){
		
		App::getSmarty()->assign('page_title','Kalkulator kredytowy');
                App::getSmarty()->assign('page_description', 'Strona logowania');
		App::getSmarty()->assign('form',$this->form);
		App::getSmarty()->display('LoginView.tpl');		
	}
}