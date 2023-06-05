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

    public function quotationSum()
    {
        return $this->hasMany(DesignerQuotation::class,'estimator_designer_list_id','id');
    }
    public function checkCommentReply()
    {
        return $this->hasMany(EstimatorDesignerComment::class)->where(['reply'=>NULL]);
    }

    public function estimatorDesignerListTasks()
    {
        return $this->hasMany(EstimatorDesignerListTask::class,'estimator_designer_list_id');
    }
}
