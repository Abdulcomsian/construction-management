<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignerQuotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'description',
        'date',
        'email',
        'temporary_work_id'
    ];
}
