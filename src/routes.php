<?php

Route::group( [
	'middleware'=> config('lex.route.middleware'),
	'prefix'	=> config('lex.route.prefix'),
	'as'		=> config('lex.route.as') ], function () {
		Route::resource('lex', 'Smarch\Lex\Controllers\CurrencyController');
		Route::get('lex/orderby/{field}', 'Smarch\Lex\Controllers\CurrencyController@index')->name('lex.orderby');
		Route::get('lex/{lex}/cumulative', 'Smarch\Lex\Controllers\CurrencyController@showCumulative')->name('lex.cumulative');
		Route::post('lex/{lex}/cumulative', 'Smarch\Lex\Controllers\CurrencyController@updateCumulative')->name('lex.cumulative');
	}
);