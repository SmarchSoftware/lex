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

}
