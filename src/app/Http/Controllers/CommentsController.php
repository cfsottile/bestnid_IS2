<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Comment;
use App\Models\Auction;
use App\User;

use Request;
use Auth;
use Session;

class CommentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments = Auth::user()->comments;
		return redirect()->with('comments',$comments);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//not implemented
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$data = Request::all();

		$validator = Comment::validate($data);

		if ($validator->fails()) {
			return redirect()
				->back()
				->with('error', 'Su mensaje no guardado, debe contener entre 2 y 511 carácteres');
		}

		if (Auth::user() != null) {
			$data['owner_id'] = Auth::user()->id;
		} else {
			return redirect()->route('registrationPersuasion')->with('message', 'Tenés que estar registrado para hacer comentarios.');
		}

		Comment::create($data);
		return redirect()->back()->with('success', 'Comentario hecho!');
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
		$data = Request::all();
		$validator = Comment::validate($data);

		if ($validator->fails()){
			return redirect()->back()->with('error', 'Su mensaje debe contener entre 2 y 511 carácteres');
		}

		$comment = Comment::find($id);
		$comment->edit($data);

		return redirect()->back()->with('success', 'Mensaje editado');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Comment::destroy($id);

		return redirect()->back()->with('success', 'Comentario eliminado!');

	}

	public function response()
	{

		$data = Request::all();
		$validator = Comment::validateResponse($data);

		if($validator->fails()){
			return redirect()->back()->with('error', 'Respuesta no guardada, debe tener entre 2 y 511 caracteres');
		}

		$comment = Comment::find($data['comment_id']);
		$comment->respond($data);

		return redirect()->back()->with('success', 'Comentario respondido!');


	}

}
