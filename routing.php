<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('start'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

//Utils::addRoute('hello', 'HelloCtrl');
//Utils::addRoute('hello2', 'HelloCtrl2', ["user-typer","user-mistrz","admin"]);

Utils::addRoute('start', 'MainCtrl');
Utils::addRoute('mojeTypy', 'MainCtrl', ["user-typer","user-mistrz"]);
Utils::addRoute('typuj', 'MainCtrl', ["user-typer"]);
Utils::addRoute('typyInnychGraczy', 'MainCtrl', ["user-typer","user-mistrz"]);
Utils::addRoute('typowanieMistrza', 'MainCtrl', ["user-typer","user-mistrz"]);
Utils::addRoute('typujMistrza', 'MainCtrl', ["user-mistrz"]);
Utils::addRoute('tabela', 'MainCtrl', ["user-typer","user-mistrz"]);
Utils::addRoute('regulamin', 'MainCtrl', ["user-typer","user-mistrz","admin"]);

Utils::addRoute('admin', 'AdminCtrl', ["admin"]);
Utils::addRoute('wstawWynikMeczu', 'AdminCtrl', ["admin"]);
Utils::addRoute('usunMecz', 'AdminCtrl', ["admin"]);
Utils::addRoute('dodajMecz', 'AdminCtrl', ["admin"]);
Utils::addRoute('usunReprezentacje', 'AdminCtrl', ["admin"]);
Utils::addRoute('dodajReprezentacje', 'AdminCtrl', ["admin"]);
Utils::addRoute('usunRole', 'AdminCtrl', ["admin"]);
Utils::addRoute('dodajRole', 'AdminCtrl', ["admin"]);
Utils::addRoute('usunUzytkownika', 'AdminCtrl', ["admin"]);
Utils::addRoute('dodajUzytkownika', 'AdminCtrl', ["admin"]);

Utils::addRoute('login', 'loginCtrl');
Utils::addRoute('logout', 'loginCtrl');