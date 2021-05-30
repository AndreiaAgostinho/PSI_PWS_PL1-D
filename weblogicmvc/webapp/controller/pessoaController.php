<?php 
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\Interfaces\ResourceControllerInterface;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;

/**
 * CRUD Resource Controller for ActiveRecord Model pessoa
 *
 * Code generated by WebLogicMVC Code Builder
 *
 * Date: 2021-05-24
 *
 * WL Code Builder developed by Sílvio Priem Mendes
 * *
 */
class pessoaController extends BaseController implements ResourceControllerInterface
{
	/**
	 * Returns index view with all records
	 */
	public function index()
	{
		$pessoas = pessoa::all();
		return View::make('pessoa.index', ['pessoas' => $pessoas]);
	}


	/**
	 * Returns a view with a form to create a new record
	 */
	public function create()
	{
		return View::make('project.registo');
	}


	/**
	 * Receives new record data through POST method and stores it in the DB table
	 */
	public function store()
	{
		//create new resource (activerecord/model) instance with data from POST
		//your form name fields must match the ones of the table fields
		$pessoa = new pessoa(Post::getAll());

		if($pessoa->is_valid()){
		    $pessoa->save();
		    Redirect::toRoute('home/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('pessoa/create', ['pessoa' => $pessoa]);
		}
	}


	/**
	 * return a detailed view with record where PK = $id
	 */
	public function show($id)
	{
		$pessoa = pessoa::find([$id]);

		if (is_null($pessoa)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('pessoa.perfil', ['pessoa' => $pessoa]);
		}
	}


	/**
	 * return a editable form view with record where PK = $id
	 */
	public function edit($id)
	{
		$pessoa = pessoa::find([$id]);

		if (is_null($pessoa)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('pessoa.edit', ['pessoa' => $pessoa]);
		}
	}


	/**
	 * Receives record data through POST method and updates it in the DB table
	 */
	public function update($id)
	{
		//find resource (activerecord/model) instance where PK = $id
		//your form name fields must match the ones of the table fields
		$pessoa = pessoa::find([$id]);
		$pessoa->update_attributes(Post::getAll());

		if($pessoa->is_valid()){
		    $pessoa->save();
		    Redirect::toRoute('pessoa/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('pessoa/edit', ['pessoa' => $pessoa]);
		}
	}


	/**
	 * deletes the record where PK = $id
	 */
	public function destroy($id)
	{
		$pessoa = pessoa::find([$id]);
		$pessoa->delete();
		Redirect::toRoute('pessoa/index');
	}

	public function login(){

		return View::Make('home/login');
	}

	public function verifylogin(){

		$username = Post::get("username");
		$password = Post::get("password");

		$pessoas = pessoa::find_all_by_username([$username], array('select' => 'palavrapasse'));

		foreach ($pessoas as $pessoa) {
                if ($password == $pessoa->palavrapasse) {
                	$pessoas = pessoa::find_all_by_username_and_palavrapasse([$username], [$password]);
                	foreach ($pessoas as $pessoa)
                	{
                		$_SESSION["ID"] = $pessoa->idpessoa;
                		$_SESSION["Nome"] = $pessoa->nome;
                	}

                    Redirect::toRoute('home/index');
                }
            }

            
            View::Make('home/login');
        }

    public function perfil(){
    	View::Make('project.perfil');
    }

    public function sair(){
    	$_SESSION["ID"] = null;
    	$_SESSION["Nome"] = null;
    	Redirect::toRoute('home/index');
    }
}
