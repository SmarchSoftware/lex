<?php

namespace Smarch\Lex;

use Illuminate\Database\Eloquent\Model;

use Smarch\Lex\Models\Currency;

class Lex extends Currency
{

    /**
     * Do some mathamagics.
    */
	public function convert($from, $to = '1', $quantity = '1')
	{
		return ( $this->getValue($from) / $this->getValue($to) ) * $quantity;
	}


    /**
     * convert to base using slug or lowest available
     */
	public function convertToBase($from, $quantity = '1')
	{
        // check for defined base slug first, if not grab lowest valued.
        if (! $to = Currency::where('slug','base')->where('available',1)->first()) {
    		$to = Currency::orderBy('base_value','asc')->where('available',1)->first();
        }

		return $this->convert($from, $to->id, $quantity);
	}


    /**
     * Get value of currency
     * @return [int]
     */
    public function value($cur) {
        return $this->getValue($cur);
    }


	/**
	 * Get the base value for currency provided.
	 * accepts either ID or Name.
	 */
	protected function getValue($cur)
	{
		$where = is_int($cur) ? 'id' : 'name';
		$res = Currency::where($where,$cur)->first();

		return $res->base_value;
	}

}