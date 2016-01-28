<?php

namespace Smarch\Lex\Models;

use Illuminate\Database\Eloquent\Model;

use Smarch\Lex\Models\Currency;

class User extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
     * The users that have the currencies.
     */
    public function currencies()
    {
        return $this->hasMany('Smarch\Lex\Models\Currency')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}

