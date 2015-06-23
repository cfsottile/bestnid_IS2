<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Category;

use Auth;
use App\User;
use Request;
use Session;

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
	public function superIndex()
	{
		$auctions = Auction::all();


		if (Request::has('date_start') && Request::has('date_end')) {

			 $from = Request::get('date_start');
			 $to = Request::get('date_end');

			$auctions = Auction::whereBetween('created_at',[$from,$to])->get();
		}

		if ((Request::has('date_start') && !Request::has('date_end'))	|| (!Request::has('date_start') && Request::has('date_end')))
		{
			Session::flash('error','Debe introducir ambas fechas');
		}

		return view('auctions.superIndex')->with('auctions', $auctions);
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
		}

		if (Auth::user() != null) {
			$data['owner_id'] = Auth::user()->id;
		} else {
			return redirect()->route('registrationPersuasion')->with('message', 'Tenés que estar registrado para dar de alta subastas.');
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

		return redirect()->route('auctions.exito')->with('auctionTitle', $data['title']);
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
		return view('auctions.show')->with('auction', $auction);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function postWinner ($id) {
		$auction = Auction::find($id);
		$winner_id = Request::get('winner_id');
		if (Auth::user() != null
				&& (Auth::user()->id == $auction->owner->id)
				&& (User::find($winner_id) != null)) {
			$auction->winner()->associate(User::find($winner_id));
			$auction->save();
		} else {
			return view('errors.picaron');
		}
	}

	public function exito () {
		return view('auctions.exito');
	}

}
