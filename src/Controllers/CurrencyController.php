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
		$resource = Currency::findOrFail($id);
		$show = "1";
		return view('lex::show', compact('resource', 'show'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$resource = Currency::findOrFail($id);
		$show = "0";
		return view('lex::edit', compact('resource', 'show'));
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
				
		$level = "danger";
		$message = " Currency not edited.";

		$currency = Currency::findOrFail($id);		
		if ( $currency->update($request->all()) ) {
			$level = "success";
			$message = "<i class='fa fa-check-square-o fa-1x'></i> Success! Currency edited.";
		}

		return redirect()->route('lex.index')
				->with( ['flash' => ['message' => $message, 'level' =>  $level] ] );
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
