<?php


namespace App\Http\DTOs;


use App\Helpers\Transform;
use App\Http\Requests\SaveExpense;
use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class ExpenseData extends DataTransferObject
{

    /** @var int */
    public $amount;

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
            'amount'      => Transform::moneyToInt($request->input('amount')),
            'description' => $request->input('description'),
            'due_date'    => new Carbon($request->input('due_date')),
            'issue_date'  => new Carbon($request->input('issue_date')),
            'tags'        => $request->input('tags')
        ]);
    }

}