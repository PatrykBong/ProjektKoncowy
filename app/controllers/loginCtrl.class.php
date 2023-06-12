<?php

namespace app\controllers;

use core\App;
//use core\Message;
//use core\Utils;
use core\ParamUtils;
use core\Validator;
use core\RoleUtils;
use core\SessionUtils;

class loginCtrl {
    
    public function action_login() {
        
        if(RoleUtils::inRole("admin") || RoleUtils::inRole("user-typer") || RoleUtils::inRole("user-mistrz")){
            App::getRouter()->redirectTo("start");
        }
        
        $val = new Validator();
        $login = $val->validate(ParamUtils::getFromPost("login"),['trim'=>true]);
        $haslo = $val->validate(ParamUtils::getFromPost("haslo"),['trim'=>true]);
        
        $wynikDB = App::getDB()->select("uzytkownik",[
                                        "id_uzytkownik","nick","haslo","imie","nazwisko","punkty"
                                        ]);
        foreach($wynikDB as $wiersz){
            if($wiersz["nick"] == $login && $wiersz["haslo"] == $haslo){
                //Utils::addInfoMessage("Pomyślnie zalogowano");
                $imieDB = $val->validate($wiersz["imie"],['trim'=>true]);
                $nazwDB = $val->validate($wiersz["nazwisko"],['trim'=>true]);
                $nickDB = $val->validate($wiersz["nick"],['trim'=>true]);
                $pktDB = $val->validate($wiersz["punkty"],['trim'=>true]);
                $id_uzytkownika = $val->validate($wiersz["id_uzytkownik"],['trim'=>true]);
                SessionUtils::store("imie", $imieDB);
                SessionUtils::store("nazwisko", $nazwDB);
                SessionUtils::store("nick", $nickDB);
                SessionUtils::store("pkt", $pktDB);
                SessionUtils::store("idUzytkownika", $id_uzytkownika);
                $wynikDB2 = App::getDB() -> select("rola-uzytkownik",[
                            "[><]rola"=>["id_rola"=>"id_rola"]
                            ],[
                            "rola-uzytkownik.id_uzytkownik","rola.nazwa"
                            ],[
                            "rola-uzytkownik.id_uzytkownik"=>$id_uzytkownika
                            ]);
                foreach($wynikDB2 as $wiersz2){
                    $rola = $wiersz2["nazwa"];
                    RoleUtils::addRole($rola);
                }
                App::getRouter()->redirectTo("start");
            }
        }
        
        App::getSmarty()->display("login.tpl");
        
    }
    
    public function action_logout() {
        RoleUtils::removeRole("admin");
        RoleUtils::removeRole("user-typer");
        RoleUtils::removeRole("user-mistrz");
        SessionUtils::remove("imie");
        SessionUtils::remove("nazwisko");
        SessionUtils::remove("nick");
        SessionUtils::remove("pkt");
        App::getSmarty()->display("login.tpl");
    }
    
}
