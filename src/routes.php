<?php

Route::group( [
	'middleware'=> config('lex.route.middleware'),
	'prefix'	=> config('lex.route.prefix'),
	'as'		=> config('lex.route.as') ], function () {
		Route::resource('lex', 'Smarch\Lex\Controllers\CurrencyController');
	}
);