<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Category;

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

		return view('auctions.superIndex')->with('auctions', $auctions);
	}




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		dd($request);
		$this->validates($request, Auction::rules());

		$data = $request;
		$data['owner_id'] = Auth::user()->id;

		return Auction::create($data);
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

	public function assignWinner ($id) {
		$winner_id = Request::get('winner_id');
		Auction::find($id)->winner()->associate(User::find($winner_id));
	}
}
