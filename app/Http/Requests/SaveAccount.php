<?php

namespace App\Http\Requests;

use Cknow\Money\Money;
use Illuminate\Foundation\Http\FormRequest;

class SaveAccount extends FormRequest
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
        return [
            'name'          => 'required|string',
            'balance'       => 'required|integer',
            'special_limit' => 'required|integer',
            'type'          => 'required',
            'owner_id'      => 'required'
        ];
    }

    public function validationData()
    {
        $data = parent::validationData();

        return array_merge($data, [
            'balance'       => Money::parseByDecimal($data['balance'], 'USD')->getAmount(),
            'special_limit' => Money::parseByDecimal($data['special_limit'], 'USD')->getAmount(),
        ]);
    }
}
