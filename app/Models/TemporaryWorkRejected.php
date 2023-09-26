<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmailExtra;
class TemporaryWorkRejected extends Model
{
    use HasFactory;
     protected $guarded = [];
     
     public function email_extra()
    {
        return $this->morphMany(EmailExtra::class, 'mailable');
    }
}
