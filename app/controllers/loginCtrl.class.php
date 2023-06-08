<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use core\RoleUtils;

class loginCtrl {
    
    public function action_login() {
        
        if(RoleUtils::inRole("admin") || RoleUtils::inRole("user")){
            App::getRouter()->redirectTo("hello2");
        }
        
        $val = new Validator();
        $login = $val->validate(ParamUtils::getFromPost("login"),['trim'=>true]);
        $haslo = $val->validate(ParamUtils::getFromPost("haslo"),['trim'=>true]);
        
        $wynikDB = App::getDB()->select("uzytkownik",["id_uzytkownik","nick","haslo"]);
        foreach($wynikDB as $wiersz){
            if($wiersz["nick"] == $login && $wiersz["haslo"] == $haslo){
                //Utils::addInfoMessage("Pomyślnie zalogowano");
                $id_uzytkownika = $wiersz["id_uzytkownik"];
                $wynikDB2 = App::getDB() -> select("rola-uzytkownik",[
                            "[><]rola"=>["id_rola"=>"id_rola"]
                            ],[
                            "rola-uzytkownik.id_uzytkownik","rola.nazwa"
                            ],[
                            "rola-uzytkownik.id_uzytkownik"=>$id_uzytkownika
                            ]);
                foreach($wynikDB2 as $wiersz2){
                    $rola = $wiersz2["nazwa"];
                }
                RoleUtils::addRole($rola);
                App::getRouter()->redirectTo("hello2");
            }
        }
        
        App::getSmarty()->display("login.tpl");
        
    }
    
    public function action_logout() {
        RoleUtils::removeRole("admin");
        RoleUtils::removeRole("user");
        App::getSmarty()->display("login.tpl");
    }
    
}
