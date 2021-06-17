<?php

use ArmoredCore\Controllers\BaseController;
use ArmoredCore\Interfaces\ResourceControllerInterface;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;

/**
 * CRUD Resource Controller for ActiveRecord Model arrive
 *
 * Code generated by WebLogicMVC Code Builder
 *
 * Date: 2021-06-11
 *
 * WL Code Builder developed by Sílvio Priem Mendes
 * *
 */
class arriveController extends BaseController implements ResourceControllerInterface
{
	/**
	 * Returns index view with all records
	 */
	public function index()
	{
		$arrives = arrive::all();
		return View::make('arrive.index', ['arrives' => $arrives]);
	}


	/**
	 * Returns a view with a form to create a new record
	 */
	public function create()
	{
		return View::make('arrive.create');
	}


	/**
	 * Receives new record data through POST method and stores it in the DB table
	 */
	public function store()
	{
		//create new resource (activerecord/model) instance with data from POST
		//your form name fields must match the ones of the table fields
		$arrive = new arrive(Post::getAll());

		if($arrive->is_valid()){
		    $arrive->save();
		    Redirect::toRoute('arrive/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('arrive/create', ['arrive' => $arrive]);
		}
	}


	/**
	 * return a detailed view with record where PK = $id
	 */
	public function show($id)
	{
		$arrive = arrive::find([$id]);

		if (is_null($arrive)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('arrive.show', ['arrive' => $arrive]);
		}
	}


	/**
	 * return a editable form view with record where PK = $id
	 */
	public function edit($id)
	{
		$arrive = arrive::find([$id]);

		if (is_null($arrive)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('arrive.edit', ['arrive' => $arrive]);
		}
	}


	/**
	 * Receives record data through POST method and updates it in the DB table
	 */
	public function update($id)
	{
		//find resource (activerecord/model) instance where PK = $id
		//your form name fields must match the ones of the table fields
		$arrive = arrive::find([$id]);
		$arrive->update_attributes(Post::getAll());

		if($arrive->is_valid()){
		    $arrive->save();
		    Redirect::toRoute('arrive/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('arrive/edit', ['arrive' => $arrive]);
		}
	}


	/**
	 * deletes the record where PK = $id
	 */
	public function destroy($id)
	{
		$arrive = arrive::find([$id]);
		$arrive->delete();
		Redirect::toRoute('arrive/index');
	}
}

?>