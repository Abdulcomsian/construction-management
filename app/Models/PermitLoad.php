<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitLoad extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function tempwork()
    {
        return $this->belongsTo(TemporaryWork::class,'temporary_work_id','id');
    }
    public function blocks()
    {
        return $this->belongsTo(ProjectBlock::class,'block_id');
    }
    public function signatures()
    {
        return $this->hasMany(Signature::class, 'signatureable_id');
    }
}
