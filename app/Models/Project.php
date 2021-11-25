<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function companies()
    {
        return $this->belongsToMany(User::class, 'companies_has_projects', 'project_id', 'company_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'companies_has_projects', 'project_id', 'user_id');
    }
}
