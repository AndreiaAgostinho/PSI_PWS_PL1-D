<?php

use ArmoredCore\Controllers\BaseController;
use ArmoredCore\Interfaces\ResourceControllerInterface;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;

/**
 * CRUD Resource Controller for ActiveRecord Model airport
 *
 * Code generated by WebLogicMVC Code Builder
 *
 * Date: 2021-06-11
 *
 * WL Code Builder developed by Sílvio Priem Mendes
 * *
 */
class airportController extends BaseController implements ResourceControllerInterface
{
	/**
	 * Returns index view with all records
	 */
	public function index()
	{
		$airports = airport::all();
		return View::make('airport.index', ['airports' => $airports]);
	}


	/**
	 * Returns a view with a form to create a new record
	 */
	public function create()
	{
		return View::make('airport.create');
	}


	/**
	 * Receives new record data through POST method and stores it in the DB table
	 */
	public function store()
	{
		//create new resource (activerecord/model) instance with data from POST
		//your form name fields must match the ones of the table fields
		$airport = new airport(Post::getAll());

		if($airport->is_valid()){
		    $airport->save();
		    Redirect::toRoute('airport/gestao');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('airport/create', ['airport' => $airport]);
		}
	}


	/**
	 * return a detailed view with record where PK = $id
	 */
	public function show($id)
	{
		$airport = airport::find([$id]);

		if (is_null($airport)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('airport.show', ['airport' => $airport]);
		}
	}


	/**
	 * return a editable form view with record where PK = $id
	 */
	public function edit($id)
	{
		$airport = airport::find([$id]);

		if (is_null($airport)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('airport.edit', ['airport' => $airport]);
		}
	}


	/**
	 * Receives record data through POST method and updates it in the DB table
	 */
	public function update($id)
	{
		//find resource (activerecord/model) instance where PK = $id
		//your form name fields must match the ones of the table fields
		$airport = airport::find([$id]);
		$airport->update_attributes(Post::getAll());

		if($airport->is_valid()){
		    $airport->save();
		    Redirect::toRoute('airport/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('airport/edit', ['airport' => $airport]);
		}
	}


	/**
	 * deletes the record where PK = $id
	 */
	public function destroy($id)
	{
		$airport = airport::find([$id]);
		$airport->delete();
		Redirect::toRoute('airport/gestao');
	}

	public function gestao(){

		$airports = airport::all();
		return View::make('project.gestaoaeroportos', ['airports' => $airports]);
	}
}

?>