<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;
    protected $fillable = [
        'signatureable_id',
        'signature',
        'signatureable_type',
        'name',
        'job_title',
        'company',
        'date',
    ];
    public function signatureable()
    {
        return $this->morphTo();
    }
}
