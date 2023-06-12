<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\ParamUtils;

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
                                        'LIMIT'=>3, 'ORDER'=> "data"//where date.now()-date>0
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
                                        ]);
        $i = 0;
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
        SessionUtils::store("listaID", $listaID);
        App::getSmarty()->assign("tabela",$wynikDB); 
        App::getSmarty()->assign("lista",$listaID); 
        App::getSmarty()->display("MojeTypy.tpl");
    }
    
    public function action_typuj() {
        $listaID = SessionUtils::load("listaID");
        $i = 0;
        $uzytkownik = SessionUtils::load("idUzytkownika", $keep = true);
        foreach($listaID as $linia){
            $meczSTR = "id".strval($listaID[$i]);
            $typSTR = "wynik".strval($listaID[$i]);
            $mecz = ParamUtils::getFromPost($meczSTR);
            $typ = ParamUtils::getFromPost($typSTR);
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
            $i++;
        }
        App::getRouter()->redirectTo("mojeTypy");
    }
}
