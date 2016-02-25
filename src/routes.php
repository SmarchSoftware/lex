<?php

Route::group( [
	'middleware'=> config('lex.route.middleware'),
	'prefix'	=> config('lex.route.prefix'),
	'as'		=> config('lex.route.as') ], function () {
		Route::resource('lex', 'Smarch\Lex\Controllers\CurrencyController',
			['names' => [
	    		'create'	=> 'create',
	    		'destroy'	=> 'destroy',
	    		'edit'		=> 'edit',
	    		'index'		=> 'index',
	    		'show'		=> 'show',
	    		'store'		=> 'store',
	    		'update'	=> 'update'
				]
			]
		);
		Route::get('lex/orderby/{field}', 'Smarch\Lex\Controllers\CurrencyController@index')->name('orderby');
		Route::get('lex/{lex}/cumulative', 'Smarch\Lex\Controllers\CurrencyController@showCumulative')->name('cumulative');
		Route::post('lex/{lex}/cumulative', 'Smarch\Lex\Controllers\CurrencyController@updateCumulative')->name('cumulative');
	}
);