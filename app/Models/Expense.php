<?php

namespace App\Models;

use App\Models\Concerns\TranslateModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Expense extends Model
{
    use HasTags, TranslateModel;

    protected $fillable = [
        'amount',
        'description',
        'due_date',
        'issue_date',
        'tags'
    ];

    protected $dates = [
        'due_date',
        'issue_date',
        'created_at',
        'updated_at'
    ];

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */

    /**
     * @param \Carbon\Carbon $date
     */
    public function setDueDateAttribute(Carbon $date)
    {
        $this->attributes['due_date'] = $date->format('Y-m-d');
    }

    /**
     * @param \Carbon\Carbon $date
     */
    public function setIssueDateAttribute(Carbon $date)
    {
        $this->attributes['issue_date'] = $date->format('Y-m-d');
    }
}
