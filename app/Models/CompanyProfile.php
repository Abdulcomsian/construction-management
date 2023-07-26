<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function otherdocs()
    {
        return $this->hasMany(ProfileOtherDocuments::class);
    }
    public function payment_detail()
    {
        return $this->hasOne(PaymentDetail::class,'company_profile_id');
    }
}
