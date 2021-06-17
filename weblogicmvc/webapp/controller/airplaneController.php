<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\Interfaces\ResourceControllerInterface;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;

/**
 * CRUD Resource Controller for ActiveRecord Model airplane
 *
 * Code generated by WebLogicMVC Code Builder
 *
 * Date: 2021-06-11
 *
 * WL Code Builder developed by Sílvio Priem Mendes
 * *
 */
class airplaneController extends BaseController implements ResourceControllerInterface
{
	/**
	 * Returns index view with all records
	 */
	public function index()
	{
		$airplanes = airplane::all();
		return View::make('airplane.index', ['airplanes' => $airplanes]);
	}


	/**
	 * Returns a view with a form to create a new record
	 */
	public function create()
	{
		return View::make('airplane.create');
	}


	/**
	 * Receives new record data through POST method and stores it in the DB table
	 */
	public function store()
	{
		//create new resource (activerecord/model) instance with data from POST
		//your form name fields must match the ones of the table fields
		$airplane = new airplane(Post::getAll());

		if($airplane->is_valid()){
		    $airplane->save();
		    Redirect::toRoute('airplane/gestaoavioes');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('airplane/create', ['airplane' => $airplane]);
		}
	}


	/**
	 * return a detailed view with record where PK = $id
	 */
	public function show($id)
	{
		$airplane = airplane::find([$id]);

		if (is_null($airplane)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('airplane.show', ['airplane' => $airplane]);
		}
	}


	/**
	 * return a editable form view with record where PK = $id
	 */
	public function edit($id)
	{
		$airplane = airplane::find([$id]);

		if (is_null($airplane)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('airplane.edit', ['airplane' => $airplane]);
		}
	}


	/**
	 * Receives record data through POST method and updates it in the DB table
	 */
	public function update($id)
	{
		//find resource (activerecord/model) instance where PK = $id
		//your form name fields must match the ones of the table fields
		$airplane = airplane::find([$id]);
		$airplane->update_attributes(Post::getAll());

		if($airplane->is_valid()){
		    $airplane->save();
		    Redirect::toRoute('airplane/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('airplane/edit', ['airplane' => $airplane]);
		}
	}


	/**
	 * deletes the record where PK = $id
	 */
	public function destroy($id)
	{
		$airplane = airplane::find([$id]);
		$airplane->delete();
		Redirect::toRoute('airplane/gestaoavioes');
	}

	public function gestao(){

		$airplanes = airplane::all();
		return View::make('project.gestaoavioes', ['airplanes' => $airplanes]);

	}
}

?>