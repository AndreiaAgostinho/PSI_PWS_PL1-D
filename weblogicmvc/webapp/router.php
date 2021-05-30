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
Router::get('home/start',	'HomeController/start');
Router::get('home/login', 'pessoaController/login');


Router::get('test/index',  'TestController/index');
Router::get('pessoa/create', 'pessoaController/create');
Router::post('pessoa/create', 'pessoaController/store');
Router::post('pessoa/store', 'pessoaController/store');
Router::post('home/login', 'pessoaController/verifylogin');
Router::get('pessoa/perfil', 'pessoaController/perfil');
Router::get('pessoa/sair', 'pessoaController/sair');











/************** End of URLEncoder Routing Rules ************************************/