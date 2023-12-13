<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'image',
        'address',
        'company_id',
        'job_title',
        'auto_backup',
        'representative_name',
        'nomination',
        'nomination_status',
        'description_of_role',
        'Description_limits_authority',
        'authority_issue_permit',
        'appointment_pdf',
        'appointment_signature',
        'appointment_date',
        'nomination_approve_reject_date',
        'designer_company',
        'email_verified_at',
        'added_by',
        'di_designer_id',
        'user_notify',
        'company_policy',
        'admin_designer',
        'view_price',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companyProjects()
    {
        return $this->hasMany(Project::class, 'company_id');
    }

    public function userProjects()
    {
        return $this->belongsToMany(Project::class, 'users_has_projects', 'user_id', 'project_id')->withPivot('nomination');
    }

    public function userCompany()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function usernomination()
    {
         return $this->hasOne(Nomination::class)->orderBy('id','desc');
    }

    public function userDiCompany()
    {
        return $this->belongsTo(User::class, 'di_designer_id');
    }

    public function companyProfile()
    {
        return $this->hasOne(CompanyProfile::class , 'user_id' , 'id');
    }

    public function paymentDetail()
    {
        return $this->hasOne(PaymentDetail::class);
    }

    public function jobs()
    {
        return $this->hasMany(TemporaryWork::class , 'created_by');
    }
    public function desingerSelected()
    {
        return $this->hasOne(SelectedOnlineDesigners::class , 'designer_id')->where('company_id',Auth::id());
    }
    public function supplierSelected()
    {
        return $this->hasOne(SelectedOnlineSupplier::class , 'supplier_id')->where('company_id',Auth::id());
    }
}
