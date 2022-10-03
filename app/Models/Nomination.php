<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function projectt()
    {
        return $this->belongsTo(Project::class,'project','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
