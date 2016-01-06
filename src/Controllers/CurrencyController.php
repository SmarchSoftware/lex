<?php

namespace Smarch\Lex\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Smarch\Lex\Models\Currency;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CurrencyController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$currencies = Currency::paginate( config('lex.pagination', 15) );
		return view('lex::index', compact('currencies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lex::create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if you need to validate any input.
				
		$level = "danger";
		$message = " Currency not created.";

		if ( Currency::create($request->all()) ) {
			$level = "success";
			$message = "<i class='fa fa-check-square-o fa-1x'></i> Success! Currency created.";
		}

		return redirect()->route('lex.index')
				->with( ['flash' => ['message' => $message, 'level' =>  $level] ] );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$currency = Currency::findOrFail($id);
		return view('lex::show', compact('currency'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$currency = Currency::findOrFail($id);
		return view('lex::edit', compact('currency'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if you need to validate any input.
		$currency = Currency::findOrFail($id);
		$currency->update($request->all());
		return redirect('currency');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Currency::destroy($id);
		return redirect('currency');
	}

}
