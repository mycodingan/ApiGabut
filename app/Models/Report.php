<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'report_date',
        'total_users',
        'total_loans',
        'total_approved_loans',
    ];

    protected $casts = [
        'report_date' => 'date',
    ];
}
