<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    const STATUSES = [
        'Monthly', 'Weekly', 'Daily'
    ];

    const FREQUENCIES = [
        '1-2', '3-4', '5+'
    ];

    protected $guarded = ['id'];
}
