<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignBriefStatus extends Model
{
    use HasFactory;
    protected $table = "design_brief_status";
    protected $fillable = ["temporary_work_id", "status"];
}
