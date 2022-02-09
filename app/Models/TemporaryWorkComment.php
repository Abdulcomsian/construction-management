<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryWorkComment extends Model
{
    use HasFactory;

    public function tempwork()
    {
        return $this->belongsTo(TemporaryWork::class);
    }
}
