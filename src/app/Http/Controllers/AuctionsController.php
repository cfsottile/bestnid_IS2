<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Category;
use App\Models\Offer;

use Auth;
use App\User;
use Request;
use Session;
use Validator;
use Carbon;

class AuctionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array();
		$orderCriteria = Request::get('orderCriteria', 'created_at');
		$orderDirection = Request::get('direction', 'desc');
		if (Request::has('query')) {
			$query = Request::get('query');
			if (Request::get('category', false)) {
				$auctions = Auction::isOfCategory(Category::idForName($query)->first()->id)
					->currents()->orderBy($orderCriteria, $orderDirection)->get();
				$data['category'] = true;
			} else {
				$auctions = Auction::nameIncludes($query)->currents()->orderBy($orderCriteria, $orderDirection)->get();
			}
			$data['query'] = $query;
		} else {
			$auctions = Auction::currents()->orderBy($orderCriteria, $orderDirection)->get();
		}
		$data['auctions'] = $auctions;
		return view('auctions.index')->with($data);
	}

	/**
	 * Shows auctions index intended for administrator tasks.
	 *
	 * @return Response
	 */
	public function adminindex()
	{
		$auctions = Auction::all();
		$report_data = null;


		if (Request::has('date_start') && Request::has('date_end')) {

			 $from = Request::get('date_start');
			$to= (Carbon\Carbon::parse(Request::get('date_end'))->addDays(1));

			$auctions = Auction::whereBetween('created_at',[$from,$to])->get();

			if($from > $to){
				return redirect()->back()
												->with('error','Intervalo de tiempo no válido')
												->with('users', $auctions);
			}

			// dd(Auction::finalized($to->toDateString())->get());

			$report_data = ['date_start' => $from,
											'date_end' => $to->subDay(1)->toDateString()
											// 'finalized_auctions_count' => count(Auction::finalizedOnDate($to->toDateString())->get())
										];
		}

		if ((Request::has('date_start') && !Request::has('date_end'))	|| (!Request::has('date_start') && Request::has('date_end')))
		{
			Session::flash('error','Debe introducir ambas fechas');
		}

		return view('auctions.superIndex')->with('auctions', $auctions)
																			->with('report_data', $report_data);
	}




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('auctions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Request::all();
		$validator = Auction::initialValidate($data);

		// if (AuctionsController::validateImageDimension()) {
		// 	$validator->messages()->add('image', 'La dimensión de la imagen no puede ser mayor a 500x500');
		// 	return redirect()->back()->with('errors', $validator->messages())->withInput();
		// };

		if ($validator->fails()) {
			return redirect()
				->back()
				->with('errors', $validator->messages())
				->withInput();
		dd($data);
		}

		if (Auth::user() != null) {
			$data['owner_id'] = Auth::user()->id;
		} else {
			// return redirect()->route('registrationPersuasion')->with('message', 'Tenés que estar registrado para dar de alta subastas.');
			return redirect()->route('login')->with('errors', 'Tenés que estar registrado para dar de alta una subasta');
		}

		$data['category_id'] = Category::idForName($data['categoryName'])->first()->id;
		$data['end_date'] = Date('Y/m/d', strtotime("+" . $data['durationInDays'] . " days"));
		$data['picture'] = 'auction_'.Date('YmdHis').$data['owner_id'].rand(100,999);

		$validator = Auction::finalValidate($data);
		if ($validator->fails()) {
			return redirect()
				->back()
				->with('errors', $validator->messages())
				->withInput();
		}

		Request::file('image')->move(public_path().'/images/', $data['picture']);
		Auction::create($data);

		return redirect()->route('auctions.index')->with('success', '¡Subasta creada con éxito!');
		// return view('auctions.exito')->with('message', 'Subasta creada con');
	}

	public static function validateImageDimension () {
		list($width, $height) = getimagesize(Request::file('image'));
		return ($width <= 500) && ($height <= 500);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$auction = Auction::find($id);
		if (!$auction->finished()
				|| AuctionsController::checkLoggedUserIdIs($auction->owner->id)
				|| AuctionsController::loggedUserIsAdmin()) {
			return view('auctions.show')->with('auction', $auction);
		} else {
			return redirect()->route('auctions.index')->with('error', 'La subasta que querés ver finalizó');
		}
	}

	public static function loggedUserIsAdmin () {
		return (Auth::user() != null) && (Auth::user()->is_admin == 1);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$auction = Auction::find($id);
		if (AuctionsController::checkLoggedUserIdIs($auction->owner->id) && ($auction != null)) {
			if (count($auction->offers) == 0) {
				return view('auctions.edit')->with('auction', $auction);
			} else {
				return redirect()->back()->with('error', 'La subasta \''.$auction->title.'\' no puede ser modificada porque tiene ofertas');
			}
		} else {
			return view('errors.picaron');
		}
	}

	public static function checkLoggedUserIdIs($id) {
		return (Auth::user() != null) && (Auth::user() == User::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$auction = Auction::find($id);
		if (!AuctionsController::checkLoggedUserIdIs($auction->owner->id)) {
			return view('errors.picaron');
		}

		$data = Request::all();

		$maxDurationInDays = 30 - $auction->elapsedDays();
		$minDurationInDays = 15 - $auction->elapsedDays();
		if ($minDurationInDays < 1) { $minDurationInDays = 1; }
		$initialRules = [
			'title' => 'required|string|min:3|max:255',
			'description' => 'required',
			'categoryName' => 'required|string|exists:categories,name',
			'durationInDays' => 'required|integer|between:'.$minDurationInDays.','.$maxDurationInDays
		];

		if (Request::has('modifyImage')) {
			$initialRules['image'] = 'required|image|mimes:jpg,jpeg,png';
		}

		$validator = Validator::make($data, $initialRules);
		if ($validator->fails()) {
			return redirect()->back()->with('errors', $validator->messages())->withInput();
		}

		$data['category_id'] = Category::idForName($data['categoryName'])->first()->id;
		$data['end_date'] = Date('Y/m/d', strtotime("+" . $data['durationInDays'] . " days"));
		if (Request::has('modifyImage')) {
			$data['picture'] = 'auction_'.Date('YmdHis').$auction->owner_id.rand(100,999);
			$validator = Validator::make($data, ['picture' => 'required|string|min:4']);
			if ($validator->fails()) {
				return redirect()->back()->with('errors', $validator->messages())->withInput();
			}
			Request::file('image')->move(public_path().'/images/', $data['picture']);
		}

		$auction->title = $data['title'];
		$auction->description = $data['description'];
		$auction->end_date = $data['end_date'];
		$auction->category_id = $data['category_id'];
		if (Request::has('modifyImage')) {
			$auction->picture = $data['picture'];
		}

		$auction->save();

		return redirect()->route('auctions.show', $auction->id)->with('success', 'Subasta actualizada con éxito');
		// return view('auctions.exito')->with('message', 'Subasta actualizada con');
		// return redirect()->route('auctions.exito')->with(['message' => 'Subasta actualizada con']);

		// return redirect()->route('users.myAuctions');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$auction = Auction::find($id);
		if (AuctionsController::checkLoggedUserIdIs($auction->owner->id) && ($auction != null)) {
			if ($auction->isDeleteable()) {
				$auction->delete();
				return redirect()->route('auctions.index')->with('success', 'La subasta'.$auction->title.' ha sido eliminada.');
			} else {
				return redirect()->back()->with('error', 'La subasta'.$auction->title.' no puede ser eliminada porque posee ofertas o ya finalizó.');
			}
		}
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function adminDestroy($id)
	{
		//ver "soft delete", podria servir


		$auction = Auction::find($id);

		// dd($auction->isDeleteable());

		if($auction->isDeleteable()){
			$auction->delete();
			return redirect()->back()->with('success', 'Subasta eliminado con exito');
		}else{
			return redirect()->back()->with('error', 'No puede eliminar esta subasta, tiene ofertas activas');

		}
	}

	public function postWinner ($id) {
		$auction = Auction::find($id);
		$winner = User::find(Request::get('winner_id'));
		$offer = Offer::find(Request::get('offer_id'));
		if (Auth::user() != null
				&& (Auth::user()->id == $auction->owner->id)
				&& ($winner != null)) {
			if ($winner->cc_data == 1234123412341234) {
				$winner->notifyPaymentError($auction);
				return redirect()->back()->with('error', 'Hubo un problema al momento de efectuar el cobro. Por favor, intentá nuevamente más tarde o elegí otro/a ganador/a');
			}
			$auction->winner()->associate($winner);
			$auction->save();
			$auction->owner->sendWinnerData($auction, $offer);
			$winner->notifyWonAuction($auction);
			return redirect()->back()->with('success', 'El/la ganador/a fue seleccionado con éxito, y el cobro ha sido realizado. Recibirás por email el monto de la oferta y los datos del/la ganador/a');
			// return view('auctions.exito')->with('message', 'Cobro efectuado con');
		} else {
			return view('errors.picaron');
		}
	}

	public function exito () {
		return view('auctions.exito');
	}

}
