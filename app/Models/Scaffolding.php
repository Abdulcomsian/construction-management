<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scaffolding extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
     public function tempwork()
    {
        return $this->belongsTo(TemporaryWork::class,'temporary_work_id','id');
    }
}
