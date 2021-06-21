<?php

use ArmoredCore\Controllers\BaseController;
use ArmoredCore\Interfaces\ResourceControllerInterface;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;

/**
 * CRUD Resource Controller for ActiveRecord Model arrival
 *
 * Code generated by WebLogicMVC Code Builder
 *
 * Date: 2021-06-11
 *
 * WL Code Builder developed by Sílvio Priem Mendes
 * *
 */
class arrivalController extends BaseController implements ResourceControllerInterface
{
	/**
	 * Returns index view with all records
	 */
	public function index()
	{
		$arrivals = arrival::all();
		return View::make('arrival.index', ['arrivals' => $arrivals]);
	}


	/**
	 * Returns a view with a form to create a new record
	 */
	public function create()
	{
		return View::make('arrival.create');
	}


	/**
	 * Receives new record data through POST method and stores it in the DB table
	 */
	public function store()
	{
		//create new resource (activerecord/model) instance with data from POST
		//your form name fields must match the ones of the table fields
		$arrival = new arrival(Post::getAll());

		if($arrival->is_valid()){
		    $arrival->save();
		    Redirect::toRoute('arrival/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('arrival/create', ['arrival' => $arrival]);
		}
	}


	/**
	 * return a detailed view with record where PK = $id
	 */
	public function show($id)
	{
		$arrival = arrival::find([$id]);

		if (is_null($arrival)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('arrival.show', ['arrival' => $arrival]);
		}
	}


	/**
	 * return a editable form view with record where PK = $id
	 */
	public function edit($id)
	{
		$arrival = arrival::find([$id]);

		if (is_null($arrival)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('arrival.edit', ['arrival' => $arrival]);
		}
	}


	/**
	 * Receives record data through POST method and updates it in the DB table
	 */
	public function update($id)
	{
		//find resource (activerecord/model) instance where PK = $id
		//your form name fields must match the ones of the table fields
		$arrival = arrival::find([$id]);
		$arrival->update_attributes(Post::getAll());

		if($arrival->is_valid()){
		    $arrival->save();
		    Redirect::toRoute('arrival/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('arrival/edit', ['arrival' => $arrival]);
		}
	}


	/**
	 * deletes the record where PK = $id
	 */
	public function destroy($id)
	{
		$arrival = arrival::find([$id]);
		$arrival->delete();
		Redirect::toRoute('arrival/index');
	}
}

?>