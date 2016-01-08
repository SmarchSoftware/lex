<?php

namespace Smarch\Lex\Facades;

use Illuminate\Support\Facades\Facade;

class LexFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lex';
    }
}