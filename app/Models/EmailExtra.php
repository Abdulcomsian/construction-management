<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailExtra extends Model
{
    use HasFactory;
    public $fillable = ['attachment','cc_emails'];
    public $casts = ['created_at','updated_at'];
    public function mailable()
    {
        return $this->morphTo();
    }
}
