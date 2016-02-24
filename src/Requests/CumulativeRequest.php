<?php

namespace Smarch\Lex\Requests;

use App\Http\Requests\Request;

class CumulativeRequest extends Request
{
    /**
     * Determine if the character is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'quantity.required' => 'You must specify a quantity to assign.',
            'character_id.required' => 'You have to select at least one character.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'quantity' => 'required|numeric|between:-100000,100000',
            'character_id'  => 'required'
        ];

        if ($this->request->has('character_id')) {
            foreach($this->request->get('character_id') as $key => $val)
            {
                $rules['character_id.'.$key] = 'integer|min:1';
            }
        }

        return $rules;
    }
}
