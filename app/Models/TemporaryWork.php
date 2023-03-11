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
    public function checkdesignuploadfile()
    {
        return $this->hasMany(TempWorkUploadFiles::class);
    }
    public function riskassesment()
    {
        return $this->hasMany(TempWorkUploadFiles::class)->whereIn('file_type',[5,6]);
    }
    public function commentlist()
    {
        return $this->hasMany(TemporaryWorkComment::class);
    }
    public function comments()
    {
        return $this->hasMany(TemporaryWorkComment::class)->where('type','normal');
    }

    public function scancomment()
    {
        return $this->hasMany(TemporaryWorkComment::class)->where('type','scan');
    }

    public function rejecteddesign()
    {
        return $this->hasMany(TemporaryWorkRejected::class);
    }

    public function reply()
    {
        return $this->hasMany(TemporaryWorkComment::class)->where('type','normal')->where('replay','!=','');
    }

    public function rejectedpermits() //this relation for open permit check in table
    {
        return $this->hasMany(PermitLoad::class)->where('status',5);
    }

    public function permits() //this relation for open permit check in table
    {
         return $this->hasMany(PermitLoad::class)->whereIn('status',[1,5]);
    }

    public function closedpermits()
    {
         return $this->hasMany(PermitLoad::class)->whereIn('status',[0]);
    }

    public function unloadpermits()
    {
         return $this->hasMany(PermitLoad::class)->whereIn('status',[3]);
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
    public function designer()
    {
        return $this->hasOne(EstimatorDesignerList::class);
    }
    public function checkQuestion()
    {
        return $this->hasMany(EstimatorDesignerList::class)->where(['public_message'=>1]);
    }
}
