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


class OfferController extends Controller {

	/**
	 * Display a listing of the resource.
	 * Ofertas de UN usuario
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$offers = $user->offers;

		return view('offers.index')->with('offers',$offers);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$auction = Auction::find(Request::input('auction_id'));
		return view('offers.create')
			->with('auction_id', $auction->id)
			->with('auction_title', $auction->title);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Request::all();
		$validator = Offer::validate($data);

		if($validator->fails()){
			return redirect()->back()->with('errors', $validator->messages());
		}

		if(Auth::user()->hasOfferOn(Auction::find($data['auction_id']))){
			return redirect()->route('auctions.show', ['id' => $data['auction_id']])->with('error', 'Ya tenes una oferta hecha para esta subasta!');
		}


		// dd($data);
		Offer::create($data);
		return redirect()->route('auctions.show', ['id' => $data['auction_id']])->with('success', 'Oferta hecha!');


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		Offer::destroy($id);

		return redirect()->back()->with('success', 'Oferta eliminada!');
	}

}
