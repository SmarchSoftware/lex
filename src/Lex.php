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
     * Shortcut to convert to base
    */
	public function convertToBase($from)
	{
		return $this->convert($from, $to->id);
	}

    /**
     * Do some mathamagics.
    */
	public function convert($from, $to = '1')
	{
		$to_where = int($to) ? 'id' : 'name';
		$to = Currency::where('base_value',$to);

		$from_where = int($from) ? 'id' : 'name';
		$from = Currency::where('base_value',$from);

	}

}