<?php

use ArmoredCore\Controllers\BaseController;
use ArmoredCore\Interfaces\ResourceControllerInterface;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;

/**
 * CRUD Resource Controller for ActiveRecord Model partida
 *
 * Code generated by WebLogicMVC Code Builder
 *
 * Date: 2021-05-24
 *
 * WL Code Builder developed by Sílvio Priem Mendes
 * *
 */
class partidaController extends BaseController implements ResourceControllerInterface
{
	/**
	 * Returns index view with all records
	 */
	public function index()
	{
		$partidas = partida::all();
		return View::make('partida.index', ['partidas' => $partidas]);
	}


	/**
	 * Returns a view with a form to create a new record
	 */
	public function create()
	{
		return View::make('partida.create');
	}


	/**
	 * Receives new record data through POST method and stores it in the DB table
	 */
	public function store()
	{
		//create new resource (activerecord/model) instance with data from POST
		//your form name fields must match the ones of the table fields
		$partida = new partida(Post::getAll());

		if($partida->is_valid()){
		    $partida->save();
		    Redirect::toRoute('partida/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('partida/create', ['partida' => $partida]);
		}
	}


	/**
	 * return a detailed view with record where PK = $id
	 */
	public function show($id)
	{
		$partida = partida::find([$id]);

		if (is_null($partida)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('partida.show', ['partida' => $partida]);
		}
	}


	/**
	 * return a editable form view with record where PK = $id
	 */
	public function edit($id)
	{
		$partida = partida::find([$id]);

		if (is_null($partida)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('partida.edit', ['partida' => $partida]);
		}
	}


	/**
	 * Receives record data through POST method and updates it in the DB table
	 */
	public function update($id)
	{
		//find resource (activerecord/model) instance where PK = $id
		//your form name fields must match the ones of the table fields
		$partida = partida::find([$id]);
		$partida->update_attributes(Post::getAll());

		if($partida->is_valid()){
		    $partida->save();
		    Redirect::toRoute('partida/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('partida/edit', ['partida' => $partida]);
		}
	}


	/**
	 * deletes the record where PK = $id
	 */
	public function destroy($id)
	{
		$partida = partida::find([$id]);
		$partida->delete();
		Redirect::toRoute('partida/index');
	}
}