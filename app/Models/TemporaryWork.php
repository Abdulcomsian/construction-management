<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryWork extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function uploadfile()
    {
        return $this->hasMany(TempWorkUploadFiles::class);
    }
    public function comments()
    {
        return $this->hasMany(TemporaryWorkComment::class);
    }

    public function permits() //this relation for open permit check in table
    {
        return $this->hasOne(PermitLoad::class)->where('status', '=', 1);
    }
}
