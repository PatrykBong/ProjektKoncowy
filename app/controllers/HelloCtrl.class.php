<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\Validator;
use core\ParamUtils;

/**
 * HelloWorld built in Amelia - sample controller
 *
 * @author Przemysław Kudłacik
 */
class HelloCtrl {
    
    public function action_hello() {
		        
        $variable = 123;
        //$variable = App::GetRouter()->getAction();
        if(RoleUtils::inRole('user')){
            $variable+=1000;
        }
        if(RoleUtils::inRole('admin')){
            $variable+=10000;
        }
        $val = new Validator();
        //$fname1 = $val->validate(ParamUtils::getFromPost("wynik1"),['trim'=>true]);
        //$fname2 = $val->validate(ParamUtils::getFromPost("wynik2"),['trim'=>true]);
        
        App::getMessages()->addMessage(new Message("Hello world message", Message::INFO));
        Utils::addInfoMessage("Or even easier message :-)");
        
        App::getSmarty()->assign("value",$variable);        
        //App::getSmarty()->assign("value21",$fname1);        
        //App::getSmarty()->assign("value22",$fname2);        
        App::getSmarty()->display("Hello.tpl");
        
    }
    
}
