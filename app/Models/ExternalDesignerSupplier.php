<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalDesignerSupplier extends Model
{
    use HasFactory;

    public function designerSupplierCompany()
    {
        return $this->belongsTo(User::class,'company_id');
    }
}
