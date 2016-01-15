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
            'base_value' => 'required|min:1|numeric',
            'convertible' => 'required|boolean',
            'tradeable' => 'required|boolean',
            'sellable' => 'required|boolean',
            'rewardable' => 'required|boolean',
            'discoverable' => 'required|boolean',
            'available' => 'required|between:0,2',
            'notes' => 'string|max:255|min:2',
            'type' => 'string|max:255|min:2',
        ];

    }
}