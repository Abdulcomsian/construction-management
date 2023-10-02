<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignerCompanyEmail extends Model
{
    use HasFactory;
    protected $fillable = [
        'temporary_work_id',
        'email',
    ];
}
