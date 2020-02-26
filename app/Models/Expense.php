<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Expense extends Model
{
    use HasTags;

    protected $fillable = [
        'amount',
        'fine',
        'discount',
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
}
