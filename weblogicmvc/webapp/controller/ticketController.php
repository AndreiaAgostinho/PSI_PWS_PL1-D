<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\Interfaces\ResourceControllerInterface;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Data;
use Carbon\Carbon;

/**
 * CRUD Resource Controller for ActiveRecord Model ticket
 *
 * Code generated by WebLogicMVC Code Builder
 *
 * Date: 2021-06-11
 *
 * WL Code Builder developed by Sílvio Priem Mendes
 * *
 */
class ticketController extends BaseController implements ResourceControllerInterface
{
	/**
	 * Returns index view with all records
	 */
	public function index()
	{
		$tickets = ticket::all();
		return View::make('ticket.index', ['tickets' => $tickets]);
	}


	/**
	 * Returns a view with a form to create a new record
	 */
	public function create()
	{
		return View::make('ticket.create');
	}


	/**
	 * Receives new record data through POST method and stores it in the DB table
	 */
	public function store()
	{
		//create new resource (activerecord/model) instance with data from POST
		//your form name fields must match the ones of the table fields
		$ticket = new ticket(Post::getAll());

		if($ticket->is_valid()){
		    $ticket->save();
		    Redirect::toRoute('ticket/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('ticket/create', ['ticket' => $ticket]);
		}
	}


	/**
	 * return a detailed view with record where PK = $id
	 */
	public function show($id)
	{
		$ticket = ticket::find([$id]);

		if (is_null($ticket)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('ticket.show', ['ticket' => $ticket]);
		}
	}


	/**
	 * return a editable form view with record where PK = $id
	 */
	public function edit($id)
	{
		$ticket = ticket::find([$id]);

		if (is_null($ticket)) {
		   //TODO redirect to standard error page
		} else {
		    return View::make('ticket.edit', ['ticket' => $ticket]);
		}
	}


	/**
	 * Receives record data through POST method and updates it in the DB table
	 */
	public function update($id)
	{
		//find resource (activerecord/model) instance where PK = $id
		//your form name fields must match the ones of the table fields
		$ticket = ticket::find([$id]);
		$ticket->update_attributes(Post::getAll());

		if($ticket->is_valid()){
		    $ticket->save();
		    Redirect::toRoute('ticket/index');
		} else {
		    //redirect to form with data and errors
		    Redirect::flashToRoute('ticket/edit', ['ticket' => $ticket]);
		}
	}


	/**
	 * deletes the record where PK = $id
	 */
	public function destroy($id)
	{
		$ticket = ticket::find([$id]);
		$ticket->delete();
		Redirect::toRoute('ticket/index');
	}

	public function comprar($id_one){

		$id = explode(",", $id_one);
		for($i = 0; $i < sizeof($id); $i++){

			$flight = flight::find([$id[$i]]);
			$departure = new Carbon($flight->departure->horariopartida);
		
			$horaembarque = $departure->subHours(1);

			$Letter = array('A','B','C','D','E','F');
		
			$lugar = rand(1,70) . $Letter[rand(0,5)];

			$portaembarque = rand(1, 20);

			$oneflight = array(
			'flight' => $flight, 
			'horaembarque' => $horaembarque,
			'lugar' => $lugar, 
			'portaembarque' => $portaembarque
			);

			$allflights[$i] = $oneflight;

		}
		View::make('project.comprarbilhete', ['allflight' => $allflights]);
	}

	public function confirmcomprar(){


		$allflights = $_SESSION["allflights"];
		
		$_SESSION["allflights"] = null;

		$bilhete = array(
		'horacompra' => Carbon::now(),
		'idaevolta' => 'I',
		'checkin' => 'N',
		'valor' => Post::get('valor'),
		'people_id' => $_SESSION['Id']
		);

		$ticket = new ticket($bilhete);

		if($ticket->is_valid()){
		    $ticket->save();
			
		    $ticket = ticket::last();

		    foreach ($allflights as $allflight) {
		    	
		    	$bilhete_voo = array(
		    	'horarioembarque' => $allflight["horaembarque"],
		    	'lugar' =>  $allflight["lugar"],
		    	'portaembarque' => $allflight["portaembarque"],
		    	'flight_id' => $allflight["flight"]->id,
		    	'ticket_id' => $ticket->id
		    	);

				$ticketflight = new ticketsflight($bilhete_voo);

				if($ticketflight->is_valid()){
		    		$ticketflight->save();
				}
		    }

			View::make('project.pagamento', ['valor' => Post::get('valor'), 'referencia' => rand(000000000, 999999999), 'entidade' => 15278]);
		   
		}
	}
}


?>