<?php

if ( str_contains( app()->version(), '5.2.' ) ){
	Route::group(['middleware' => 'web'], function () {
		Route::resource('lex', 'Smarch\Lex\Controllers\CurrencyController');
	});
} else {
	Route::resource('lex', 'Smarch\Lex\Controllers\CurrencyController');
}