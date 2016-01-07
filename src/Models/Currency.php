<?php 

namespace Smarch\Lex\Models;

use Illuminate\Database\Eloquent\Model;

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
    public function scopeConvertible($query)
    {
        return $query->where('convertible', 1);
    }

    /**
     * Scope a query to only include tradeable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTradeable($query)
    {
        return $query->where('tradeable', 1);
    }

    /**
     * Scope a query to only include sellable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSellable($query)
    {
        return $query->where('sellable', 1);
    }

    /**
     * Scope a query to only include rewardable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRewardable($query)
    {
        return $query->where('rewardable', 1);
    }

    /**
     * Scope a query to only include discoverable currencies
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDiscoverable($query)
    {
        return $query->where('discoverable', 1);
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
}
