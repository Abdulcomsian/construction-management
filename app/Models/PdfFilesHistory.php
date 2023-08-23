<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfFilesHistory extends Model
{
    use HasFactory;
    public $table = 'pdf_files_history';

    public function pdffiles_history()
    {
        return $this->belongsTo(TemporaryWork::class , 'tempwork_id' );
    }
}
