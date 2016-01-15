<?php

namespace Smarch\Lex;

use Illuminate\Database\Eloquent\Model;

use Smarch\Lex\Models\Currency;

class Lex extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * Scope a query to only include convertible currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function convertible() {
		return Currency::convertible();
	}

    /**
     * Scope a query to only include tradeable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function tradeable()
    {
        return Currency::tradeable();
    }

    /**
     * Scope a query to only include sellable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function sellable()
    {
        return Currency::sellable();
    }

    /**
     * Scope a query to only include rewardable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function rewardable()
    {
        return Currency::rewardable();
    }

    /**
     * Scope a query to only include discoverable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function discoverable()
    {
        return Currency::discoverable();
    }

    /**
     * Scope a query to only include available currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function available($val = 1)
    {
        return Currency::available($val);
    }

    /**
     * Scope a query to only include certain type currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function type($type = '')
    {
        return Currency::type($type);
    }

    /**
     * Do some mathamagics.
    */
	public function convert($from, $to = '1', $quantity = '1')
	{
		return ( $this->getValue($from) / $this->getValue($to) ) * $quantity;
	}

    /**
     * Shortcut to convert to base
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
     * Shortcut to convert to highest available
     */
	public function convertToHigh($from, $quantity = '1')
	{
		$to = Currency::orderBy('base_value','desc')->where('available',1)->first();
		return $this->convert($from, $to->id, $quantity);
	}

    /**
     * sort out required number to obtain
    */
	public function howMany($have, $want, $quantity_have = '1', $quantity_want = '1')
	{
		$want_total = $this->getValue($want) * $quantity_want; // i.e. 1 dollar (1 x 100 = 100 pennies)
		$have_total = $this->getValue($have) * $quantity_have; // i.e. 4 nickels (4 x 5 = 20 pennies)
		
		$remains = ($want_total - $have_total); //i.e. 80 pennies

		$needs =  ($remains / $this->getValue($have) ); // [80 / 5 = 16 nickels (= 80 pennies) ]

		return $needs;
	}

    /**
     * Shortcut
    */
	public function getHowMany($have, $want, $quantity_have = '1')
	{
		return $this->convert($have, $want, $quantity_have);
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