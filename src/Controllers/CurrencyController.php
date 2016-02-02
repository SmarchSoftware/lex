<?php

namespace Smarch\Lex\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Smarch\Lex\Models\Currency;
use Smarch\Lex\Requests\StoreRequest;
use Smarch\Lex\Requests\UpdateRequest;
use Smarch\Omac\OmacTrait;

class CurrencyController extends Controller
{

	use OmacTrait;

	/**
	 * constructor
	 * 
	 * @param boolean acl Whether or not ACL is enabled
	 * @param string $driver Which ACL package to use
	 * @param string $unauthorized View partial to use for denied access
	 */
	public function __construct() {
		$this->acl = config('lex.acl.enable');
		$this->driver = config('lex.acl.driver');
        $this->unauthorized = config('lex.views.unauthorized');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if ( $this->checkAccess( config('lex.acl.index') ) ) {
			$currencies = Currency::orderBy('base_value')->paginate( config('lex.pagination', 15) );
			return view( config('lex.views.index'), compact('currencies') );
		}
		
		return view( $this->unauthorized, ['message' => 'view currency list'] );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if ( $this->checkAccess( config('lex.acl.create') ) ) {
			return view( config('lex.views.create') );
		}

		return view( $this->unauthorized, ['message' => 'create new currency types'] );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreRequest $request)
	{				
		if ( $this->checkAccess( config('lex.acl.create') ) ) {
			Currency::create( $request->all() );
			return redirect()->route('lex.index')
				->with( ['flash' => ['message' => "<i class='fa fa-check-square-o fa-1x'></i> Success! Currency created.", 'level' => "success"] ] );
		}

		return redirect()->route('lex.index')
			->with( ['flash' => ['message' => "You are not permitted to create currencies", 'level' =>  "danger"] ] );		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if ( $this->checkAccess( config('lex.acl.show') ) ) {
			$resource = Currency::findOrFail($id);
			$show = "1";
			return view( config('lex.views.edit'), compact('resource', 'show') );
		}

		return view( $this->unauthorized, ['message' => 'view existing currency types'] );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if ( $this->checkAccess( config('lex.acl.edit') ) ) {
			$resource = Currency::findOrFail($id);
			$show = "0";
			return view( config('lex.views.edit'), compact('resource', 'show') );
		}

		return view( $this->unauthorized, [ 'message' => 'edit existing currency types' ] );		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UpdateRequest $request)
	{
		if ( $this->checkAccess( config('lex.acl.edit') ) ) {
			$currency = Currency::findOrFail($id);
			$currency->update( $request->all() );
			return redirect()->route('lex.index')
				->with( ['flash' => ['message' =>"<i class='fa fa-check-square-o fa-1x'></i> Success! Currency edited.", 'level' =>  "success"] ] );
		}
		
		return redirect()->route('lex.index')
			->with( ['flash' => ['message' => "You are not permitted to edit currencies.", 'level' => "danger"] ] );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if ( $this->checkAccess( config('lex.acl.destroy') ) ) {
			Currency::destroy($id);
			return redirect()->route('lex.index')
				->with( ['flash' => ['message' => "<i class='fa fa-check-square-o fa-1x'></i> Success! Currency deleted.", 'level' => "warning"] ] );
		}

		return redirect()->route('lex.index')
			->with( ['flash' => ['message' => "You are not permitted to destroy currencies.", 'level' => "danger"] ] );
	}

}
