<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('hello'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('hello2', 'HelloCtrl2', ['user']['admin']);
Utils::addRoute('login', 'loginCtrl');
Utils::addRoute('logout', 'loginCtrl');