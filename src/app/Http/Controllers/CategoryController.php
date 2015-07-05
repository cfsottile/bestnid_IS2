<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Request;
use Validator;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();
		return view('categories.index')->with('categories', $categories);
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
		$data = Request::all();

		$validator = Category::validate($data);

		if ($validator->fails()) {
			return redirect()->back()->with('errors', $validator->messages());
		}

		Category::create($data);
		return redirect()->back()->with('success', 'Categoria agregada');


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
	public function update()
	{

		$data = Request::all();
		
		$category = Category::find($data['id']);

		$validator = Category::validate($data);

		if ($validator->fails()){
			return redirect()->back()->with('errors', $validator->messages());
		}

		$category->actualizar($data);

		return redirect()->back()->with('success', 'Categoria actualizada con éxito!');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		if (Category::find($id)->isDeleteable()){

			Category::destroy($id);
			return redirect()->back()->with('success', 'Categoria Eliminada con Exito');

		} else {

			return redirect()->back()->with('error', 'No se puede eliminar esta categoría, tiene subastas asociadas');

		}

	}

}
