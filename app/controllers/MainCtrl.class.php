<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\ParamUtils;
use core\Validator;
use core\Messages;

class MainCtrl {
    
    public function action_start() {
		        
        $imie = SessionUtils::load("imie", $keep = true);
        $pkt = SessionUtils::load("pkt", $keep = true);
        
        $wynikDB = App::getDB()->select("mecz",[
                                        "[><]reprezentacja(dr1)"=>["druzyna_1"=>"id_reprezentacja"],
                                        "[><]reprezentacja(dr2)"=>["druzyna_2"=>"id_reprezentacja"]
                                        ],[
                                        "dr1.nazwa(druz1)","dr2.nazwa(druz2)","mecz.data"
                                        ],[
                                        "mecz.data[>]"=> App::getDB()->raw('NOW()'), 'LIMIT'=>3, 'ORDER'=> "data" 
                                        ]);
        
        App::getSmarty()->assign("imieGracza",$imie);
        App::getSmarty()->assign("punktyGracza",$pkt);
        App::getSmarty()->assign("przyszleMecze",$wynikDB);
        App::getSmarty()->display("Start.tpl");
    }
    
    public function action_mojeTypy() {
        $idUzytkownika = SessionUtils::load("idUzytkownika", $keep = true);
        $wynikDB = App::getDB()->select("mecz",[
                                        "[><]reprezentacja(dr1)"=>["druzyna_1"=>"id_reprezentacja"],
                                        "[><]reprezentacja(dr2)"=>["druzyna_2"=>"id_reprezentacja"]
                                        ],[
                                        "dr1.nazwa(druz1)","dr2.nazwa(druz2)","mecz.data","mecz.id_mecz(typ)","mecz.id_mecz"
                                        ],[
                                        'ORDER' => ["data"=>"DESC"]
                                        ]);
        $i = 0; //c
        $listaID = [];
        foreach($wynikDB as $line){
           $idMecz = $wynikDB[$i]["typ"];
           $listaID[$i] = $wynikDB[$i]["id_mecz"];
           $typ = App::getDB()->select("typ",
                                        [
                                        "typ.typ"
                                        ],[
                                        "AND" => ["typ.mecz"=>$idMecz, "typ.uzytkownik"=>$idUzytkownika]
                                        ]);
           if(isset($typ[0]["typ"])){
               $wynikDB[$i]["typ"] = $typ[0]["typ"];
           }else{
               $wynikDB[$i]["typ"] = NULL;
           }
           $i++;
        }
        //$d = strtotime(date("Y:m:d H:i:s"));
        
        SessionUtils::store("listaID", $listaID);
        App::getSmarty()->assign("tabela",$wynikDB); 
        App::getSmarty()->assign("lista",$listaID); 
        //App::getSmarty()->assign("aaa",$d); 
        App::getSmarty()->display("MojeTypy.tpl");
    }
    
    public function action_typuj() {
        //regex "^([0-9]|[1-9][0-9]{1,})-([0-9]|[1-9][0-9]{1,})$"
        $val = new Validator();
        $listaID = SessionUtils::load("listaID");
        $i = 0;
        $uzytkownik = SessionUtils::load("idUzytkownika", $keep = true);
        foreach($listaID as $linia){
            $meczSTR = "id".strval($listaID[$i]);
            $typSTR = "wynik".strval($listaID[$i]);
            $dataSTR = "data".strval($listaID[$i]);
            $mecz = ParamUtils::getFromPost($meczSTR);
            $typ = ParamUtils::getFromPost($typSTR);
            $data = ParamUtils::getFromPost($dataSTR);
            $val->validate($typ, ['regexp'=>'/^([0-9]|[1-9][0-9]{1,})-([0-9]|[1-9][0-9]{1,})$/i']);
            if( ($val->isLastOK()) && ((strtotime($data))-strtotime(date("Y:m:d H:i:s"))>3600) ){
                App::getDB()->delete("typ",[
                    "AND"=>[
                        "mecz"=>$mecz,
                        "uzytkownik"=>$uzytkownik
                    ]
                ]);
                App::getDB()->insert("typ",[
                    "id_typ"=>NULL,
                    "uzytkownik"=>$uzytkownik,
                    "mecz"=>$mecz,
                    "typ"=>$typ
                ]);
            }//else dodaj komunikat
            $i++;
        }
        App::getRouter()->redirectTo("mojeTypy");
    }
    
    public function action_typyInnychGraczy() {//przez posta to zrobimy
        $wynikDB = App::getDB()->select("mecz",[
                                        "[><]reprezentacja(dr1)"=>["druzyna_1"=>"id_reprezentacja"],
                                        "[><]reprezentacja(dr2)"=>["druzyna_2"=>"id_reprezentacja"]
                                        ],[
                                        "dr1.nazwa(druz1)","dr2.nazwa(druz2)","mecz.data","mecz.id_mecz"
                                        ],[
                                        'ORDER'=> "mecz.data"
                                        ]);
        $tab = [];
        $i = 2;
        $tab[0] = [];
        $tab[0][1] = NULL;
        $tab[1] = [];
        $tab[1][1] = NULL;
        $tab[2] = [];
        $tab[2][1] = NULL;
        foreach($wynikDB as $line){
            $tab[0][$i] = $line["id_mecz"];
            $tab[1][$i] = $line["data"];
            $tab[2][$i] = $line["druz1"]." - ".$line["druz2"];
            $i++;
        }
        
        $wynikDB2 = App::getDB()->select("uzytkownik",[
                                        "[><]rola-uzytkownik"=>["id_uzytkownik"=>"id_uzytkownik"]
                                        ],[
                                        "uzytkownik.imie","uzytkownik.nazwisko","uzytkownik.punkty","rola-uzytkownik.id_rola","uzytkownik.id_uzytkownik"
                                        ],[
                                        "id_rola"=>2, 'ORDER'=>"imie" //2 dla user-typer
                                        ]);
        $j = 0;
        $tab2 = [];
        foreach($wynikDB2 as $line2){
            $tab2[$j] = [];
            $idUzytkownik = $line2["id_uzytkownik"];
            $wynikDB3 = App::getDB()->select("typ",[
                                        "typ","mecz","punkty"
                                        ],[
                                        "uzytkownik"=>$idUzytkownik
                                        ]);
            $ile = 0;
            foreach($tab[0] as $lineU){
                $ile++;
            }
            $ile2 = 2+2*($ile-1);
            for($i=0;$i<$ile2;$i++){
                $tab2[$j][$i] = "-";
            }
            foreach($wynikDB3 as $line3){
                $idTypu = $line3["mecz"];
                $typ = $line3["typ"];
                $pkt = $line3["punkty"];
                $l=1;
                foreach($tab[0] as $line4){
                    if($tab[0][$l] == $idTypu){
                        $tab2[$j][1+2*($l-1)] = $typ;
                        $tab2[$j][2*($l-1)] = $pkt;
                    }
                    $l++;
                }
            }
            $tab2[$j][0] = $line2["imie"]." ".$line2["nazwisko"];
            $tab2[$j][1] = $line2["punkty"];
            $j++;
        }
        
        App::getSmarty()->assign("tabela",$tab);
        App::getSmarty()->assign("tabela2",$tab2);
        App::getSmarty()->display("TypyInnychGraczy.tpl");
    }
    
    public function action_tabela(){
        $wynikDB = App::getDB()->select("uzytkownik",[
                                        "uzytkownik.imie","uzytkownik.nazwisko","uzytkownik.punkty"
                                        ],[
                                        'ORDER'=>["punkty"=>"DESC"]
                                        ]);
        App::getSmarty()->assign("tabela",$wynikDB);
        App::getSmarty()->display("Tabela.tpl");
    }
    
    public function action_regulamin(){
        App::getSmarty()->display("Regulamin.tpl"); 
    }
    
    public function action_typowanieMistrza(){
        $listaReprezentacji = App::getDB()->select("reprezentacja",["nazwa"]);
        $dataPierwszegoMeczuDB = App::getDB()->select("mecz",["data"],['LIMIT'=>1,'ORDER'=>"data"]);
        $dataPierwszegoMeczu = $dataPierwszegoMeczuDB[0]["data"];
        SessionUtils::store("data_pierwszego_meczu", $dataPierwszegoMeczu);
        SessionUtils::loadMessages();
        
        $idUzytkownika = SessionUtils::load("idUzytkownika", $keep = true);
        $typMistrzaUzytkownikaDB = App::getDB()->select("uzytkownik",[
                                        "[><]reprezentacja"=>["typ_na_mistrza"=>"id_reprezentacja"]
                                        ],[
                                        "reprezentacja.nazwa"
                                        ],[
                                        "uzytkownik.id_uzytkownik"=>$idUzytkownika
                                        ]);
        $tabelaTypowNaMistrzaDB = App::getDB()->select("uzytkownik",[
                                        "[><]reprezentacja"=>["typ_na_mistrza"=>"id_reprezentacja"]
                                        ],[
                                        "reprezentacja.nazwa","reprezentacja.w_turnieju","ile" => App::getDB()->raw("COUNT(<typ_na_mistrza>)")
                                        ],[
                                        "typ_na_mistrza[!]"=>NULL, 'GROUP'=>"typ_na_mistrza"
                                        ]);
        $typMistrzaUzytkownika=0;
        foreach($typMistrzaUzytkownikaDB as $jednaLinia){
            $typMistrzaUzytkownika = $jednaLinia[0]["nazwa"];
        }
        if(!is_null($typMistrzaUzytkownika)){
            App::getSmarty()->assign("typMUzytkownika",$typMistrzaUzytkownika);
        }
        App::getSmarty()->assign("dataPierwszegoMeczu",$dataPierwszegoMeczu);
        App::getSmarty()->assign("listaReprezentacji",$listaReprezentacji);
        App::getSmarty()->assign("tabelaTNM",$tabelaTypowNaMistrzaDB);
        App::getSmarty()->display("TypowanieMistrza.tpl"); 
    }
    
    public function action_typujMistrza(){
        $dataPierwszegoMeczu = SessionUtils::load("data_pierwszego_meczu", $keep = true);
        if(strtotime($dataPierwszegoMeczu)-strtotime(date("Y:m:d H:i:s"))>3600){
            $listaReprezentacji = App::getDB()->select("reprezentacja",["id_reprezentacja", "nazwa"]);
            $typUzytkownika = ParamUtils::getFromPost("druzyna");
            $idUzytkownika = SessionUtils::load("idUzytkownika", $keep = true);
            $ok = false;
            foreach ($listaReprezentacji as $linia) {
                if($linia["nazwa"] == $typUzytkownika){
                    $ok = true;
                    $typID = $linia["id_reprezentacja"];
                }
            }
            App::getMessages()->clear();
            if(!$ok){
                App::getMessages()->addMessage(new \core\Message("Wprowadzono niepoprawną nazwę reprezentacji", \core\Message::ERROR));
            }else{
                App::getDB()->update("uzytkownik",[
                        "typ_na_mistrza" => $typID
                    ],[
                        "id_uzytkownik"=> $idUzytkownika
                    ]);
            }
        }else{
            App::getMessages()->addMessage(new \core\Message("Czas na typowanie minęła oszuściku :)", \core\Message::INFO));
        }
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo("typowanieMistrza");
    }
}
