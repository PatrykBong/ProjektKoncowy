<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\ParamUtils;
use core\Validator;
//use core\Messages;

class AdminCtrl {
    
    public function action_admin() {
        $wynikDB = App::getDB()->select("mecz",[
                                        "[><]reprezentacja(dr1)"=>["druzyna_1"=>"id_reprezentacja"],
                                        "[><]reprezentacja(dr2)"=>["druzyna_2"=>"id_reprezentacja"]
                                        ],[
                                        "dr1.nazwa(druz1)","dr2.nazwa(druz2)","mecz.data","mecz.wynik","mecz.id_mecz"
                                        ],[
                                        'ORDER'=>["data"=>"DESC"]
                                        ]);
        $uzytkownicy = App::getDB()->select("uzytkownik",[
                                            "uzytkownik.nick","uzytkownik.id_uzytkownik","uzytkownik.imie","uzytkownik.nazwisko",
                                            ],[
                                            'ORDER'=>"nick"
                                            ]);
        $tab= [];
        $i=0;
        foreach($uzytkownicy as $linia){
            $tab[$i] = [];
            $tab[$i]["id_uzytkownik"] = $linia["id_uzytkownik"];
            $tab[$i]["nick"] = $linia["nick"];
            $tab[$i]["imie"] = $linia["imie"];
            $tab[$i]["nazwisko"] = $linia["nazwisko"];
            $tab[$i]["rola"] = [];
            $j=0;
            $wypiszRole = App::getDB()->select("rola-uzytkownik",[
                                                "[><]rola"=>["id_rola"=>"id_rola"]
                                                ],[
                                                "rola.nazwa"
                                                ],[
                                                "AND"=>["rola-uzytkownik.id_uzytkownik"=>$linia["id_uzytkownik"],"data_odebrania"=>NULL],'ORDER'=>"nazwa"
                                                ]);
            foreach($wypiszRole as $linia2){
                $tab[$i]["rola"][$j] = $linia2["nazwa"];
                $j++;
            }
            $i++;
        }
        $pureUzytkownicy = App::getDB()->select("uzytkownik",[
                                                "uzytkownik.nick"   ,"uzytkownik.id_uzytkownik","uzytkownik.imie","uzytkownik.nazwisko"
                                                ],[
                                                'ORDER'=>"nick"
                                                ]);
        $role = App::getDB()->select("rola",["nazwa"]);
        $reprezentacje = App::getDB()->select("reprezentacja","nazwa");
        $tablica = [];
        foreach ($wynikDB as $linia) {
            $tablica[$linia["id_mecz"]] = [];
            $tablica[$linia["id_mecz"]][0] = $linia["id_mecz"];
            $tablica[$linia["id_mecz"]][1] = NULL;
        }
        SessionUtils::store("tablica", $tablica);
        App::getSmarty()->assign("tab",$wynikDB);
        App::getSmarty()->assign("rep",$reprezentacje);
        App::getSmarty()->assign("uzytk",$tab);
        App::getSmarty()->assign("pureUzytk",$pureUzytkownicy);
        App::getSmarty()->assign("role",$role);
	App::getSmarty()->display("Admin.tpl");
    }
    
    public function action_wstawWynikMeczu() {
        $tablica = SessionUtils::load("tablica");
        $val = new Validator();
        
        foreach($tablica as $linia){
            $id = $linia[0];
            $wynikSTR = "wynik".strval($id);
            $wynik = $val->validate(ParamUtils::getFromPost($wynikSTR),['trim'=>true]);
            $val->validate($wynik, ['regexp'=>'/^([0-9]|[1-9][0-9]{1,})-([0-9]|[1-9][0-9]{1,})$/i']);
            if($val->isLastOK()){
                App::getDB()->update("mecz",[
                        "wynik" => $wynik
                    ],[
                        "id_mecz"=> $id
                    ]);
            }
        }
        App::getRouter()->redirectTo("admin");
    }
    
    public function action_usunMecz() {
        $doUsuniecia = ParamUtils::getFromPost("doUsuniecia");
        $czesci = explode(" ",$doUsuniecia);
        $id = $czesci[4];
        App::getDB()->delete("mecz",[
                    "id_mecz"=> $id
                    ]);
        App::getRouter()->redirectTo("admin");
    }
    
    public function action_dodajMecz() {
        $druzyna_1 = ParamUtils::getFromPost("druzyna_1");
        $druzyna_2 = ParamUtils::getFromPost("druzyna_2");
        $data = ParamUtils::getFromPost("data");
        $dr_1 = App::getDB()->get("reprezentacja", "id_reprezentacja", ["nazwa" => $druzyna_1]);
        $dr_2 = App::getDB()->get("reprezentacja", "id_reprezentacja", ["nazwa" => $druzyna_2]);
        App::getDB()->insert("mecz",[
                    "id_mecz"=>NULL,
                    "druzyna_1"=>$dr_1,
                    "druzyna_2"=>$dr_2,
                    "wynik"=>NULL,
                    "data"=>$data
                ]);
        App::getRouter()->redirectTo("admin");
    }
    
    public function action_usunReprezentacje() {
        $nazwa = ParamUtils::getFromPost("usunRep");
        App::getDB()->delete("reprezentacja",[
                    "nazwa"=> $nazwa
                    ]);
        App::getRouter()->redirectTo("admin");
    }
    
    public function action_dodajReprezentacje() {
        $nazwa = ParamUtils::getFromPost("nowaDruzyna");
        App::getDB()->insert("reprezentacja",[
                    "id_reprezentacja"=>NULL,
                    "nazwa"=>$nazwa,
                    "w_turnieju"=>1
                ]);
        App::getRouter()->redirectTo("admin");
    }
    
    public function action_usunUzytkownika() {
        $nazwa = ParamUtils::getFromPost("usunUzytkownik");
        $czesci = explode(" ",$nazwa);
        $nick = $czesci[0];
        $id = $czesci[2];
        App::getDB()->delete("uzytkownik",[
                    "AND"=>["id_uzytkownik"=> $id,"nick"=>$nick]
                    ]);
        App::getRouter()->redirectTo("admin");
    }
    
    public function action_dodajUzytkownika() {
        $nick = ParamUtils::getFromPost("nowyUzytkownikNick");
        $imie = ParamUtils::getFromPost("nowyUzytkownikImie");
        $nazwisko = ParamUtils::getFromPost("nowyUzytkownikNazwisko");
        $haslo = ParamUtils::getFromPost("nowyUzytkownikHaslo");
        $idUzytkownika = SessionUtils::load("idUzytkownika", $keep = true);
        App::getDB()->insert("uzytkownik",[
                    "id_uzytkownik"=>NULL,
                    "imie"=>$imie,
                    "nazwisko"=>$nazwisko,
                    "nick"=>$nick,
                    "haslo"=>$haslo,
                    "typ_na_mistrza"=>NULL,
                    "punkty"=>0,
                    "kto_zmodyfikowal"=>$idUzytkownika,
                    "kiedy_zmodyfikowal"=>App::getDB()->raw('NOW()')
                ]);
        App::getRouter()->redirectTo("admin");
    }
    
    public function action_usunRole() {
        $nick = ParamUtils::getFromPost("komuOdebracRole");
        $czesci = explode(" ",$nick);
        $id_uzytk = $czesci[2];
        $rola = ParamUtils::getFromPost("jakaOdebracRole");
        $idRola = App::getDB()->get("rola", "id_rola", ["nazwa" => $rola]);
        App::getDB()->update("rola-uzytkownik",[
                        "data_odebrania" => App::getDB()->raw('NOW()')
                    ],[
                        "AND"=>["id_uzytkownik"=>$id_uzytk, "id_rola"=>$idRola]
                    ]);
        App::getRouter()->redirectTo("admin");
    }
    
    public function action_dodajRole() {
        $nick = ParamUtils::getFromPost("komuDodacRole");
        $czesci = explode(" ",$nick);
        $id_uzytk = $czesci[2];
        $rola = ParamUtils::getFromPost("jakaDodacRole");
        $id_rola = App::getDB()->get("rola", "id_rola", ["nazwa" => $rola]);
        App::getDB()->insert("rola-uzytkownik",[
                    "id_rola_uzytkownik"=>NULL,
                    "id_rola"=>$id_rola,
                    "id_uzytkownik"=>$id_uzytk,
                    "data_nadania"=>App::getDB()->raw('NOW()'),
                    "data_odebrania"=>NULL
                ]);
        App::getRouter()->redirectTo("admin");
    }
}