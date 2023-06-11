<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;

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
        
        App::getMessages()->addMessage(new Message("Hello world message", Message::INFO));
        Utils::addInfoMessage("Or even easier message :-)");
        
        App::getSmarty()->assign("value",$variable);        
        App::getSmarty()->display("Hello.tpl");
        
    }
    
}
