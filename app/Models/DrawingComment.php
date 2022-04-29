<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrawingComment extends Model
{
    use HasFactory;
    protected $guarded = [];
     protected $casts = [
        'drawing_reply' => 'array',
        'reply_date'=>'array',
        'reply_image'=>'array',
    ];
}
