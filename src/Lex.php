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
     * @return object Base Currency
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
	protected function getValue($cur, $check = true)
	{
		$where = is_int($cur) ? 'id' : 'name';
		$res = Currency::where($where,$cur)->first();

        if ($res->convertible == 0 && $check === true) {
            return str_plural($res->name) . ' are not convertible.';
        }

        if ($res->available == 0) {
            return  str_plural($res->name) . ' are retired. (Valued at : '.$res->base_value.')';
        }

        if ($res->available == 2) {
            return str_plural($res->name) . ' are devalued and worthless. (Originally : '.$res->base_value.')';
        }

        return $res->base_value;
	}

}