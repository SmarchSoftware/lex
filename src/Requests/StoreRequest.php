<?php

namespace Smarch\Lex\Requests;

use App\Http\Requests\Request;

class StoreRequest extends Request
{

    /**
     * 
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

       return [
            'name' => 'required|unique:currencies|max:255|min:4',
            'slug' => 'required|unique:currencies|max:32|min:4',
            'base_value' => 'required|min:0|numeric',
            'convertible' => 'required|boolean|max:32|min:4',
            'tradeable' => 'required|boolean|max:32|min:4',
            'sellable' => 'required|boolean|max:32|min:4',
            'rewardable' => 'required|boolean|max:32|min:4',
            'discoverable' => 'required|boolean|max:32|min:4',
            'available' => 'required|between:0,2',
            'notes' => 'string|max:255|min:4',
            'type' => 'string|max:255|min:4',
        ];

    }
}
base_valuebigint(20) NOT NULL
convertibletinyint(4) NOT NULL
tradeabletinyint(4) NOT NULL
sellabletinyint(4) NOT NULL
rewardabletinyint(4) NOT NULL
discoverabletinyint(4) NOT NULL
notesvarchar(255) NULL
availabletinyint(4) NULL
typevarchar(255) NULL