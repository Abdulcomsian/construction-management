<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TemporaryWork extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function uploadfile()
    {
        return $this->hasMany(TempWorkUploadFiles::class);
    }
    public function uploadedemails()
    {
        return $this->hasMany(TempWorkUploadFiles::class)->where('file_type','=',4);
    }
    public function checkdesignuploadfile()
    {
        return $this->hasMany(TempWorkUploadFiles::class);
    }
    public function riskassesment()
    {
        return $this->hasMany(TempWorkUploadFiles::class)->whereIn('file_type',[5,6]);
    }
    public function commentlist()
    {
        return $this->hasMany(TemporaryWorkComment::class);
    }
    public function comments()
    {
        return $this->hasMany(TemporaryWorkComment::class)->where('type','normal');
    }

    public function scancomment()
    {
        return $this->hasMany(TemporaryWorkComment::class)->where('type','scan');
    }

    public function clientComments()
    {
        return $this->hasMany(TemporaryWorkComment::class)->where('type','client');
    }

    public function rejecteddesign()
    {
        return $this->hasMany(TemporaryWorkRejected::class);
    }

    public function reply()
    {
        return $this->hasMany(TemporaryWorkComment::class)->where('type','normal')->where('replay','!=','');
    }

    public function rejectedpermits() //this relation for open permit check in table
    {
        return $this->hasMany(PermitLoad::class)->where('status',5);
    }

    public function permits() //this relation for open permit check in table
    {
         return $this->hasMany(PermitLoad::class)->whereIn('status',[1,9])->where('draft_status', '0');
    }

    public function closedpermits()
    {
         return $this->hasMany(PermitLoad::class)->whereIn('status',[0]);
    }

    public function unloadpermits()
    {
         return $this->hasMany(PermitLoad::class)->whereIn('status',[3])->where('draft_status', '0');
    }
    public function unloadpermits_draft()
    {
         return $this->hasMany(PermitLoad::class)->whereIn('status',[3])->where('draft_status', '1');;
    }
    public function scaffold() //this relation for open permit check in table
    {
        return $this->hasMany(Scaffolding::class)->where('status', '=', 1);
    }

    public function temp_work_images()
    {
        return $this->hasMany(TemporayWorkImage::class);
    }

    public function permitsunload() //this relation for open permit check in table
    {
        return $this->hasMany(PermitLoad::class)->where('status', '=', 3);
    }

    public function tempshare()
    {
        return $this->hasOne(Tempworkshare::class);
    }
    public function scopdesign()
    {
        return $this->hasOne(ScopeOfDesign::class);
    }
    public function folder()
    {
        return $this->hasOne(Folder::class);
    }
    public function attachspeccomment()
    {
        return $this->hasOne(AttachSpeComment::class);
    }
    public function designer()
    {
        return $this->hasOne(EstimatorDesignerList::class);
    }
    public function checkQuestion()
    {
        return $this->hasMany(EstimatorDesignerList::class)->where(['public_message'=>1]);
    }

    public function designerQuote()
    {
        return $this->hasMany(DesignerQuotation::class);
    }

    public function thisDesignerQuote()
    {
        return $this->hasOne(DesignerQuotation::class , 'temporary_work_id' , 'id')->where('email' , auth()->user()->email); 
    }

    public function additionalInformation()
    {
        return $this->hasOne(AdditionalInformation::class , 'temporary_work_id' , 'id' )->orderBy('id','desc');
    }

    public function creator()
    {
        return $this->belongsTo(User::class , 'created_by' , 'id');
    }

    public function designerAssign()
    {
        return $this->hasOne(EstimatorDesignerList::class , 'temporary_work_id')->where('type', 'designers')->orderBy('id','desc');
    }

    public function checkerAssign()
    {
        return $this->hasOne(EstimatorDesignerList::class , 'temporary_work_id')->where('type', 'checker')->orderBy('id','desc');
    }
    public function designerCertificates()
    {
        return $this->hasOne(DesignerCertificate::class,'temporary_work_id');
    }

    public function designerCompanyEmails()
    {
        return $this->hasMany(DesignerCompanyEmail::class,'temporary_work_id');
    }

    public function unreadQuestions(){
        return $this->hasMany(EstimatorDesignerComment::class,'temporary_work_id')->whereNull('reply'); 
    }

    public function designbrief_history(){
        return $this->hasMany(PdfFilesHistory::class,'tempwork_id'); 
    }
    public function lastdesignbrief()
    {
       return $this->hasOne(PdfFilesHistory::class, 'tempwork_id')->latest();
       // order by by how ever you need it ordered to get the latest
    }
    public function pdfFilesPreCon()
    {
        return $this->hasMany(PdfFilesHistory::class , 'tempwork_id' )->where('type','=','pre_con');
    }

    public function pdfFilesDesignBrief()
    {
        return $this->hasMany(PdfFilesHistory::class, 'tempwork_id')->where('type', '=', 'design_brief');
    }
    
    public function signatures()
    {
        return $this->morphMany(Signature::class, 'signatureable');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function extraPrice(){
        return $this->hasMany(ExtraPrice::class, 'temporary_work_id');
    }

    public function getExtraPricePending(){
        return $this->hasMany(ExtraPrice::class)->where('status', '=', '0');
    }

    public function getExtraPriceRejected(){
        return $this->hasMany(ExtraPrice::class)->where('status', '=', '1');
    }

    public function getExtraPriceAccepted(){
        return $this->hasMany(ExtraPrice::class)->where('status', '=', '2');
    }

    public function getExtraPricing(){
        return $this->hasMany(ExtraPrice::class);
    }

    public function designBriefStatus(){
        return $this->hasMany(DesignBriefStatus::class);
    }
}
