<?php

namespace Smarch\Lex\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Smarch\Lex\Models\Currency;
use Smarch\Lex\Models\User as User;
use Smarch\Lex\Requests\StoreRequest;
use Smarch\Lex\Requests\UpdateRequest;
use Smarch\Lex\Requests\CumulativeRequest;
use Smarch\Omac\OmacTrait;
use Lex;

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
	public function index($orderBy = 'base_value')
	{
		if ( $this->checkAccess( config('lex.acl.index') ) ) {
			$currencies = Currency::orderBy($orderBy)->paginate( config('lex.pagination', 15) );
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

	/**
	 * Display the specified resource cumulative totals.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showCumulative($id)
	{
		if ( $this->checkAccess( config('lex.acl.cume_view') ) ) {
			$resource = Currency::findOrFail($id);
			$users = User::orderBy('name')->get();
			$total = Currency::cumulative($id);
			$total = is_string($total) ? $total : number_format($total);
			$value = Lex::convertToBase($resource->name,$total);
			$value = is_string($value) ? substr($value,0,-1) .' to ' : number_format($value);
			$common_value = Lex::convertToCommon($resource->name,$total);
			$common_value = is_string($common_value) ? substr($common_value,0,-1) .' to ' : number_format($common_value,2);
			$base = Lex::getBaseCurrency();
			$common = Lex::getCommonCurrency();
			return view( config('lex.views.cumulative'), compact('resource', 'users', 'total', 'value', 'base', 'common_value', 'common') );
		}

		return view( $this->unauthorized, ['message' => 'view currency cumulative totals'] );
	}

	/**
	 * Update the specified resource cumulative totals.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateCumulative($id, CumulativeRequest $request)
	{
		if ( $this->checkAccess( config('lex.acl.cume_edit') ) ) {
			$quantity = $request->get('quantity');
			$data = '';
			foreach($request->get('user_id') as $u) {
				$data .= '('.$u.','. $id.', GREATEST('. $quantity.',0) ), ';
			}
			$data = substr($data,0,-2);

			$query = "INSERT INTO currency_user (user_id, currency_id, quantity) VALUES $data ON DUPLICATE KEY UPDATE quantity = GREATEST(`quantity` + $quantity,0)";
			DB::statement($query);

			if ($warning = DB::select("SHOW WARNINGS") ) {

				$msg = ($warning[0]->Code == 1264) ? "That value exceeds the maximum for the 'quantity' field for one or more users."
					: 'Mysql Warning #'.$warning[0]->Code.' "'.$warning[0]->Message.'"';

				return redirect()->back()->withErrors( $msg )->withInput();

			} 

			// subquery to delete any rows left with zero
			DB::table('currency_user')->where('quantity',0)->delete();

        	return redirect()->route('lex.index')
				->with( ['flash' => ['message' =>"<i class='fa fa-check-square-o fa-1x'></i> Success! Currency totals updated.", 'level' =>  "success"] ] );

			
		}
		
		return redirect()->route('lex.index')
			->with( ['flash' => ['message' => "You are not permitted to update currency totals.", 'level' => "danger"] ] );
	}

}
