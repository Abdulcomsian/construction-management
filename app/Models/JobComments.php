<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{AdditionalInformation};

class JobComments extends Model
{
    use HasFactory;

    protected $table = "job_comments";
    protected $primaryKey ="id";
    protected $fillable = ["additional_information_id" , "comment" ,"file_destination"];

    public function AdditionalInformation()
    {
        return $this->belongsTo(AdditionalInformation::class ,"additional_information_id" , "id");
    }


}
