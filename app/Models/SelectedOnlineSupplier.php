<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedOnlineSupplier extends Model
{
    use HasFactory;
    public function supplierDetails()
    {
        return $this->hasOne(User::class,'id','supplier_id');
    }
}
