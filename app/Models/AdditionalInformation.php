<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ JobComments , TemporaryWork };

class AdditionalInformation extends Model
{
    use HasFactory;
    
    protected $table = "additional_information";
    protected $primaryKey ="id";
    protected $fillable = ["temporary_work_id" , "more_details" ,"file_path"];

    public function JobComment()
    {
        return $this->hasMany(JobComments::class , "additional_information_id" , "id");
    }

    public function temporaryWork()
    {
        return $this->belongsTo(TemporaryWork::class ,"temporary_work_id" , "id");
    }

}
