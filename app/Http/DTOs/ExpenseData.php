<?php


namespace App\Http\DTOs;


use App\Http\Requests\SaveExpense;
use Carbon\Carbon;
use Cknow\Money\Money;
use Spatie\DataTransferObject\DataTransferObject;

class ExpenseData extends DataTransferObject
{

    /** @var int */
    public $amount;

    /** @var int */
    public $fine;

    /** @var int */
    public $discount;

    /** @var string */
    public $description;

    /** @var \Carbon\Carbon */
    public $due_date;

    /** @var \Carbon\Carbon */
    public $issue_date;

    /** @var array */
    public $tags;

    /**
     * @param \App\Http\Requests\SaveExpense $request
     *
     * @return \App\Http\DTOs\ExpenseData
     * @throws \Exception
     */
    public static function fromRequest(SaveExpense $request)
    {
        return new self([
            'amount'      => (int)Money::parseByDecimal($request->input('amount'), 'USD')->getAmount(),
            'fine'        => (int)Money::parseByDecimal($request->input('fine'), 'USD')->getAmount(),
            'discount'    => (int)Money::parseByDecimal($request->input('discount'), 'USD')->getAmount(),
            'description' => $request->input('description'),
            'due_date'    => new Carbon($request->input('due_date')),
            'issue_date'  => new Carbon($request->input('issue_date')),
            'tags'        => $request->input('tags')
        ]);
    }

}