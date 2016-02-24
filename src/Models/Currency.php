<?php 

namespace Smarch\Lex\Models;

use Illuminate\Database\Eloquent\Model;

use Smarch\Lex\Models\Currency;

class Currency extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'base_value', 'convertible', 'tradeable', 'sellable', 'rewardable', 'discoverable', 'available', 'type', 'notes'];

    /**
     * Scope a query to only include convertible currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeConvertible($query, $is = true)
    {
        return $query->where('convertible', ( ($is) ? 1 : 0 ) );
    }

    /**
     * Scope a query to only include tradeable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTradeable($query, $is = true)
    {
        return $query->where('tradeable', ( ($is) ? 1 : 0 ) );
    }

    /**
     * Scope a query to only include sellable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSellable($query, $is = true)
    {
        return $query->where('sellable', ( ($is) ? 1 : 0 ) );
    }

    /**
     * Scope a query to only include rewardable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRewardable($query, $is = true)
    {
        return $query->where('rewardable', ( ($is) ? 1 : 0 ) );
    }

    /**
     * Scope a query to only include discoverable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDiscoverable($query, $is = true)
    {
        return $query->where('discoverable', ( ($is) ? 1 : 0 ) );
    }

    /**
     * Scope a query to only include available currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query, $val = 1)
    {
        return $query->where('available', $val);
    }

    /**
     * Scope a query to only include certain type currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * The characters that have the currency.
     */
    public function characters()
    {
        return $this->belongsToMany('Smarch\Lex\Models\Character', 'character_currency', 'currency_id', config('lex.characters.pivot'))
                    ->orderBy('name')
                    ->withPivot('quantity')
                    ->withTimestamps();
        ddd($huh->toSql());
    }

    public static function cumulative($id=1) {
        return \DB::table('character_currency')->where('currency_id', $id)->sum('quantity');
    }
    
}
