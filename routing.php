<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('start'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('hello2', 'HelloCtrl2', ["user-typer","user-mistrz","admin"]);

Utils::addRoute('start', 'MainCtrl');
Utils::addRoute('mojeTypy', 'MainCtrl', ["user-typer","user-mistrz"]);
Utils::addRoute('typuj', 'MainCtrl', ["user-typer","user-mistrz"]);

Utils::addRoute('login', 'loginCtrl');
Utils::addRoute('logout', 'loginCtrl');