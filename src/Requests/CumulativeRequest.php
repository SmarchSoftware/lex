<?php

namespace Smarch\Lex\Requests;

use App\Http\Requests\Request;

class CumulativeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
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
            'user_id.required' => 'You have to select at least one user.'
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
            'quantity' => 'required|numeric',
            'user_id'  => 'required'
        ];

        if ($this->request->has('user_id')) {
            foreach($this->request->get('user_id') as $key => $val)
            {
                $rules['user_id.'.$key] = 'integer|min:1';
            }
        }

        return $rules;
    }
}
