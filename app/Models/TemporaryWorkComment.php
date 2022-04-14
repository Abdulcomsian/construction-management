<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryWorkComment extends Model
{
    use HasFactory;
     protected $guarded = [];
      protected $casts = [
        'replay' => 'array',
        'reply_image'=>'array',
    ];
    public function tempwork()
    {
        return $this->belongsTo(TemporaryWork::class);
    }
}
