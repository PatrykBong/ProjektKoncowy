<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;

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
    
}
