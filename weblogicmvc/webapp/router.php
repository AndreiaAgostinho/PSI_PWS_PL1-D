<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName/methodActionName
 ****************************************************************************/

Router::get('/',			'HomeController/index');
Router::get('home/',		'HomeController/index');
Router::get('home/index',	'HomeController/index');
Router::get('home/login', 'peopleController/login');
Router::get('home/voos', 'flightController/search');


Router::get('test/index',  'TestController/index');
Router::get('pessoa/create', 'peopleController/create');
Router::post('pessoa/create', 'peopleController/store');
Router::post('pessoa/store', 'peopleController/store');
Router::post('home/login', 'peopleController/verifylogin');
Router::get('pessoa/perfil', 'peopleController/perfil');
Router::get('pessoa/sair', 'peopleController/sair');

Router::get('pessoa/gestaopessoal', 'peopleController/gestao');
Router::post('pessoa/gestaopessoal', 'peopleController/addpersonel');
Router::get('pessoa/destroy', 'peopleController/destroy');

Router::get('airport/gestao', 'airportController/gestao');
Router::post('airport/gestao', 'airportController/store');
Router::get('airport/destroy', 'airportController/destroy');

Router::get('airplane/gestaoavioes', 'airplaneController/gestao');
Router::post('airplane/gestaoavioes', 'airplaneController/store');
Router::get('airplane/destroy', 'airplaneController/destroy');





/************** End of URLEncoder Routing Rules ************************************/