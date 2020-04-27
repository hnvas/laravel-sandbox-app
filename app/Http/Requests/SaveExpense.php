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
            'amount'      => 'required|integer|min:1',
            'due_date'    => 'required|date',
            'issue_date'  => 'required|date',
            'tags'        => 'required|array'
        ];

        if (!empty($this->fine)) {
            $rules['fine'] = 'integer';
        }

        if (!empty($this->discount)) {
            $rules['discount'] = 'integer';
        }

        return $rules;
    }

    protected function validationData()
    {
        $data = parent::validationData();

        return array_merge($data, [
            'amount'   => Money::parseByDecimal($data['amount'], 'USD')->getAmount(),
            'fine'     => Money::parseByDecimal($data['fine'] ?? '0.00', 'USD')->getAmount(),
            'discount' => Money::parseByDecimal($data['discount'] ?? '0.00', 'USD')->getAmount()
        ]);
    }
}
