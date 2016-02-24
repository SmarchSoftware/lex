<?php

namespace Smarch\Lex\Models;

use Illuminate\Database\Eloquent\Model;

use Config;

use Smarch\Lex\Models\Currency;

class Character extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    function __construct() {
        $this->table = config('lex.characters.table');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    /**
     * The characters that have the currencies.
     */
    public function currencies()
    {
        return $this->hasMany('Smarch\Lex\Models\Currency')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}

