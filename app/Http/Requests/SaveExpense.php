<?php

namespace App\Http\Requests;

use Cknow\Money\Money;
use Illuminate\Foundation\Http\FormRequest;

class SaveExpense extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'description' => 'required|filled|string',
            'amount'      => 'required|numeric|min:1',
            'due_date'    => 'required|date',
            'issue_date'  => 'required|date',
            'tags'        => 'required|array'
        ];

        return $rules;
    }
}
