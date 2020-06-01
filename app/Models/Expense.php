<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

/**
 * Class Expense
 * @package App\Models
 * @property int $amount
 * @property string $description
 * @property \Carbon\Carbon $due_date
 * @property \Carbon\Carbon $issue_date
 * @property \App\Models\Tag[] $tags
 */
class Expense extends Model
{
    use HasTags;

    /**
     * @var string[]
     */
    protected $fillable = [
        'amount',
        'description',
        'due_date',
        'issue_date',
        'tags'
    ];

    /**
     * @var string[]
     */
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
