<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ User , TemporaryWork };

class ExtraPrice extends Model
{
    use HasFactory;
    protected $table ="add_extra_price";

    protected $fillable =[
        "temporary_work_id",
        "price",
        "description",
        "payment_date",
        "status",
        "adminDesigner_id",
    ];

    /*
    Status 
    0 means pending
    1 means rejected from client
    2 means accepted from client
    */

    public function temporaryWork(){
       return $this->belongsTo(TemporaryWork::class, 'temporary_work_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'adminDesigner_id', 'id');
    }
}
