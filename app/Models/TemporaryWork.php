<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TemporaryWork extends Model
{
    use HasFactory;
    use SoftDeletes;
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
        return $this->hasMany(PermitLoad::class)->where('status', '=', 1);
    }
    public function scaffold() //this relation for open permit check in table
    {
        return $this->hasMany(Scaffolding::class)->where('status', '=', 1);
    }

    public function temp_work_images()
    {
        return $this->hasMany(TemporayWorkImage::class);
    }

    public function permitsunload() //this relation for open permit check in table
    {
        return $this->hasMany(PermitLoad::class)->where('status', '=', 3);
    }

    public function tempshare()
    {
        return $this->hasOne(Tempworkshare::class);
    }
    public function scopdesign()
    {
        return $this->hasOne(ScopeOfDesign::class);
    }
    public function folder()
    {
        return $this->hasOne(Folder::class);
    }
    public function attachspeccomment()
    {
        return $this->hasOne(AttachSpeComment::class);
    }
}
