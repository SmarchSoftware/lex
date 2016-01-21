<?php

namespace Smarch\Lex\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Smarch\Lex\Models\Currency;
use Smarch\Lex\Requests\StoreRequest;
use Smarch\Lex\Requests\UpdateRequest;
use Smarch\Lex\Traits\SmarchACLTrait;

class CurrencyController extends Controller
{

	use SmarchACLTrait;

	var $acl = false;
	var $driver = 'laravel';

	/**
	 * constructor
	 * 
	 * @param boolean acl Whether or not ACL is enabled
	 * @param string $driver Which ACL package to use
	 */
	public function __construct() {
		$this->acl = config('lex.acl.enable');
		$this->driver = config('lex.acl.driver');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if ( ! $this->checkAccess( config('lex.acl.index') ) ) {
			return view( config('lex.views.unauthorized'), [ 'message' => 'view currency list' ]);
		}

		$currencies = Currency::orderBy('base_value')->paginate( config('lex.pagination', 15) );
		return view( config('lex.views.index'), compact('currencies') );
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if ( ! $this->checkAccess( config('lex.acl.create') ) ) {
			return view( config('lex.views.unauthorized'), [ 'message' => 'create new currency types' ]);
		}

		return view( config('lex.views.create') );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreRequest $request)
	{				
		if ( ! $this->checkAccess( config('lex.acl.create') ) ) {
			$level = "danger";
			$message = "You are not permitted to create currencies";
			return redirect()->route('lex.index')
				->with( ['flash' => ['message' => $message, 'level' =>  $level] ] );
		}
		
		Currency::create($request->all());
		$level = "success";
		$message = "<i class='fa fa-check-square-o fa-1x'></i> Success! Currency created.";
		
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
		if ( ! $this->checkAccess( config('lex.acl.show') ) ) {
			return view( config('lex.views.unauthorized'), [ 'message' => 'view existing currency types' ]);
		}

		$resource = Currency::findOrFail($id);
		$show = "1";
		return view( config('lex.views.edit'), compact('resource', 'show') );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if ( ! $this->checkAccess( config('lex.acl.edit') ) ) {
			return view( config('lex.views.unauthorized'), [ 'message' => 'edit existing currency types' ]);
		}

		$resource = Currency::findOrFail($id);
		$show = "0";
		return view( config('lex.views.edit'), compact('resource', 'show') );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UpdateRequest $request)
	{
		if ( ! $this->checkAccess( config('lex.acl.edit') ) ) {
			$level = "danger";
			$message = "You are not permitted to edit currencies.";
			
			return redirect()->route('lex.index')
					->with( ['flash' => ['message' => $message, 'level' =>  $level] ] );
		}

		$currency = Currency::findOrFail($id);		
		$currency->update($request->all());
		$level = "success";
		$message = "<i class='fa fa-check-square-o fa-1x'></i> Success! Currency edited.";
		
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
		if ( ! $this->checkAccess( config('lex.acl.destroy') ) ) {
			$level = "danger";
			$message = " You are not permitted to destroy currencies.";
			return redirect()->route('lex.index')
				->with( ['flash' => ['message' => $message, 'level' =>  $level] ] );
		}

		Currency::destroy($id);
		$level = "warning";
		$message = "<i class='fa fa-check-square-o fa-1x'></i> Success! Currency deleted.";

		return redirect()->route('lex.index')
				->with( ['flash' => ['message' => $message, 'level' =>  $level] ] );
	}

}
