<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckAndComment extends Model
{
    use HasFactory;
    protected $casts = [
        'radio_checks' => 'array',
        'comments' => 'array',
    ];
}
