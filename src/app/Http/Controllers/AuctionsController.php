<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Auction;

use Request;

class AuctionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::has('query')) {
			$query = Request::get('query');
			$orderCriteria = Request::get('orderCriteria', 'created_at');
			$auctions = Auction::nameIncludes($query)->currents()->orderBy($orderCriteria)->get();
			$data = array('auctions' => $auctions, 'query' => $query);
		} else {
			$orderCriteria = Request::get('orderCriteria', 'created_at');
			$auctions = Auction::currents()->orderBy($orderCriteria)->get();
			$data = array('auctions' => $auctions);
		}

		return view('auctions.index')->with($data);
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
	public function store()
	{
		//
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
}
