<?php

namespace Smarch\Lex;

use Smarch\Lex\Models\Currency;

class Lex extends Currency
{

    /**
     * Do some mathamagics
     * @param  string $from
     * @param  string $to
     * @param  string $quantity
     * @return int
     */
    public function convert($from, $to = '1', $quantity = '1')
    {
        $from_value = $this->getValue($from);
        if ( is_string($from_value) ) {
            return $from_value;
        }

        $to_value = $this->getValue($to);
        if ( is_string($to_value) ) {
            return $to_value;
        }

        return ( $from_value / $to_value ) * $quantity;
    }


    /**
     * convert to base using slug or lowest available
     * @param  string $from
     * @param  string $quantity
     * @return conversion
     */
    public function convertToBase($from, $quantity = '1')
    {
        return $this->convert($from, $this->getBaseCurrency()->id, $quantity);
    }
    

    /**
     * get the base currency object
     * @return object $base
     */
    public function getBaseCurrency() 
    {
        // check for defined base slug first, if not grab lowest valued.
        if (! $base = Currency::where('slug','base')->where('available',1)->first()) {
            $base = Currency::orderBy('base_value','asc')->where('available',1)->first();
        }

        return $base;
    }


    /**
     * convert to base using slug or lowest available
     * @param  string $from
     * @param  string $quantity
     * @return conversion
     */
    public function convertToCommon($from, $quantity = '1')
    {
        return $this->convert($from, $this->getCommonCurrency()->id, $quantity);
    }
    

    /**
     * get the common currency object
     * @return object Common Currency
     */
    public function getCommonCurrency() 
    {
        // check for defined Common slug first, if not grab lowest valued.
        if (! $common = Currency::where('slug','common')->where('available',1)->where('convertible',1)->first()) {
            $common = Currency::orderBy('base_value','desc')->where('available',1)->where('convertible',1)->first();
        }

        return $common;
    }


    /**
     * Get value of currency
     * @return 
     */
    public function value($cur) {
        return $this->getValue($cur, false);
    }


	/**
     *  Get the base value for currency provided.
     *  Accepts either ID or Name.
     * @param  string/integer $cur Currency
     * @return 
     */
	protected function getValue($res, $check = true)
	{
        $resource = $this->getObject($res);

        if ($resource->convertible == 0 && $check === true) {
            return str_plural($resource->name) . ' are not convertible.';
        }

        if ($resource->available == 0) {
            return  str_plural($resource->name) . ' are retired. (Valued at : '.$resource->base_value.')';
        }

        if ($resource->available == 2) {
            return str_plural($resource->name) . ' are devalued and worthless. (Originally : '.$resource->base_value.')';
        }

        return $resource->base_value;
	}


    /**
     * convert requested item to resource
     * @param  mixed $resource
     * @return object Currency
     */
    protected function getObject($resource)
    {
        if ( is_object($resource) ) 
            return $resource;

        $where = is_int($resource) ? 'id' : 'name';
        return Currency::where($where, $resource)->first();
    }

}