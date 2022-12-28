<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatorDesignerList extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Estimator()
    {
        return $this->belongsTo(TemporaryWork::class,'temporary_work_id','id');
    }
}
