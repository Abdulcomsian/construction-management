<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NominationCompetence extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'Site_establishment' => 'array',
        'Access_scaffolding'=>'array',
        'Formwork_falsework'=>'array',
        'Construction_plant'=>'array',
        'Excavation_earthworks'=>'array',
        'Structural_stability'=>'array',
        'Permanent_works'=>'array',
    ];
}
