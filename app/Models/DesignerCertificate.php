<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignerCertificate extends Model
{

    protected $fillable = [
        'certificate_element',
        'design_document',
        'created_by',
        'designer_signature',
        'checker_signature',
        'temporary_work_id',
        'pdf_file'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'certificate_tag', 'designer_certificate_id', 'tag_id');
    }
}