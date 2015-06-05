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
		$data = array();
		$orderCriteria = Request::get('orderCriteria', 'created_at');


		if (Request::has('query')) {
			$query = Request::get('query');
			if (Request::get('category', false)) {
				$auctions = Auction::nameIncludes($query)->currents()->orderBy($orderCriteria)->get();
			} else {
				$auctions = Auction::isOfCategory(Category::find($query))->currents()->orderBy($orderCriteria)->get();
				array_push('category' => true);
			}
			array_push($data, 'auctions' => $auctions, 'query' => $query);
		} else {
			$auctions = Auction::currents()->orderBy($orderCriteria)->get();
			array_push('auctions' => $auctions);
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
