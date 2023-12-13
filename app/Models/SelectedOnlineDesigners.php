<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedOnlineDesigners extends Model
{
    use HasFactory;
    public function designerDetails()
    {
        return $this->hasOne(User::class,'id','designer_id');
    }
}
