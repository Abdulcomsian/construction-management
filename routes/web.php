<?php

use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\TemporaryWorkController;
use App\Http\Controllers\Dashboard\EstimatorController;
use App\Http\Controllers\Dashboard\PlantController;
use App\Http\Controllers\Dashboard\SupplierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DesignerController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use  Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;



Route::get('/',function(){
    return view('auth.login');
});


//open routes========================================================================================================
//cron job for permit
Route::get('/cron-permit', [TemporaryWorkController::class, 'cron_permit']);
//cron job for desing
Route::get('/cron-design', [TemporaryWorkController::class, 'cron_design']);

Route::get('project/{id}', [TemporaryWorkController::class, 'load_scan_temporarywork'])->name('qrlink');
Route::get('show-scan-temporary-work/{id}', [TemporaryWorkController::class, 'show_scan_temporarywork'])->name('show.scan.temporarywork');
Route::get('permit-get', [TemporaryWorkController::class, 'permit_get'])->name('permit.get');

Route::get('get-comments', [TemporaryWorkController::class, 'get_comments'])->name('temporarywork.get-comments');
Route::get('comments-status', [TemporaryWorkController::class, 'comments_status'])->name('temporarywork.comments.status');
Route::post('temporary_works/comments', [TemporaryWorkController::class, 'temp_savecomment'])->name('temporarywork.storecomment');
Route::post('temporary_works/comments-replay', [TemporaryWorkController::class, 'temp_savecommentreplay'])->name('temporarywork.storecommentreplay');
//design page for designer 
Route::get('designer/upload-design/{id}',[DesignerController::class,'index'])->name('designer.uploaddesign');
Route::post('designer/store',[DesignerController::class,'store'])->name('designer.store');
Route::get('designer/delte/{id}',[DesignerController::class,'Designdelte'])->name('designer.delete');

//pc twc approval routes
Route::get('design/approve/{id}',[DesignerController::class,'pc_index'])->name('pc.approved');
Route::post('design/store',[DesignerController::class,'pc_store'])->name('design.store');

//pc twc permit to load approval routes
Route::get('design/permit-approve/{id}',[DesignerController::class,'pc_permit_index'])->name('pc.permit.approved');
Route::post('design/permit-store',[DesignerController::class,'pc_permit_store'])->name('design.permit.store');

//risk assessemetn store
Route::post('Risk-Assessment/store',[DesignerController::class,'risk_assessment_store'])->name('riskassesment.store');

//Application appointement form
Route::get('/user-appointment/{id}',[HomeController::class,'User_Appointment']);
Route::post('/user-appointment-save',[HomeController::class,'User_Appointment_save']);


Route::get('/designRelief', function () {
    return view('dashboard/screens/new-design-relief');
});
Route::post('drawing-comment',[DesignerController::class,'drawing_comment'])->name('drawing.comment');
Route::post('twc-drawing-comment',[DesignerController::class,'twc_drawing_comment'])->name('twcdrawing.comment');
//=============================================END OPEN ROUTES==========================================================

//Authentic routes================================================================================
Route::group(['middleware' => ['auth']], function () {
    //All Resource Controller
    Route::resources([
        //        'roles' => RoleController::class, //Roles and permissions
        'users' => UserController::class, //Company users
        'projects' => ProjectController::class, //Projects
        'companies' => CompanyController::class, //Companies
        'temporary_works' => TemporaryWorkController::class, //Temporary Works
        'suppliers' => SupplierController::class, //Supplier
    ]);
    Route::get('company/projects', [CompanyController::class, 'companyProjects'])->name('company.projects');
    Route::get('user/projects', [UserController::class, 'userProjects'])->name('user.projects');
    
    Route::put('user/update/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::post('company/update/password', [CompanyController::class, 'updatePassword'])->name('company.updatePassword');

    // Route::get('get-comments', [TemporaryWorkController::class, 'get_comments'])->name('temporarywork.get-comments');
    Route::get('file-upload-date', [TemporaryWorkController::class, 'file_upload_dates'])->name('temporarywork.file-upload-dates');
    Route::post('image/delete', [TemporaryWorkController::class, 'delete_image'])->name('delete.image');

    //maunuall desing breif form 
     Route::get('manuall-designbrief-form', [TemporaryWorkController::class, 'create1'])->name('Designbrief.form');
     Route::post('manuall-designbrief-save', [TemporaryWorkController::class, 'store1'])->name('temporary_works.store1');

     //store project documents
     Route::post('temporarywork-store-project-documents',[ProjectController::class,'temporarywork_store_project_documents'])->name('temporarywork.store.project.document');
     
     Route::post('tempwork-share',[TemporaryWorkController::class,'Tempwork_share'])->name('tempwork.share');
     //user assigns projects
     Route::get('user/assing-project',[UserController::class,'User_Assign_Project'])->name('users.assign.project');
     Route::post('user/save-assing-project',[UserController::class,'User_Save_Assign_Project'])->name('users.save.assign.project');

     //route for cmpleted design brief
     Route::get('temp-completed',[TemporaryWorkController::class,'temp_completed'])->name('temp-completed');
     // This should be under 'auth' middleware group
    Route::post('/mark-as-read', [HomeController::class,'markNotification'])->name('company.markNotification');
});


//Estimator routes
Route::group(['prefix' => 'Estimator'],function(){
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('estimator',EstimatorController::class); //Estimator
        Route::get('/estimator-designer/details/{estid}/{id}',[EstimatorController::class,'estimatorQuotationDetails']);
        Route::get('/estimator-designer/comments/{estid}/{id}',[EstimatorController::class,'estimatorDesignerComments']);
        Route::post('/estimator-designer/comments-save',[EstimatorController::class,'estimatorDesignerCommentsSave']);
    });
    //Designer routes where he can price up and comment on brief
    Route::get('estimator-designer/design/{id}',[EstimatorController::class,'estimatorDesigner'])->name('estimator.designer');
    Route::post('designer-quotation/save',[EstimatorController::class,'designerQuotation'])->name('designer.quotation');
});

//nomination routes here
Route::group(['prefix' => 'Nomination'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::post('/nomination-chagnestatus',[UserController::class,'nomination_status']);
        Route::get('/nomination-get-commetns',[UserController::class,'nomination_get_comments']);
        //user project nominations
        Route::get('user/project-nomination/{id}',[UserController::class,'User_Project_Nomination'])->name('user.project.nomination');
    });
    //noimination Form
    Route::get('/nomination-form/{id}',[HomeController::class,'nomination_form'])->name('nomination-form');
    Route::get('/nomination-formm/{id}',[HomeController::class,'nomination_formm'])->name('nomination-formm');
    Route::post('/nomination-save',[HomeController::class,'nomination_save']);
    Route::get('/nomination-edit/{id}',[HomeController::class,'nomination_edit'])->name('nomination-edit');
    Route::post('/nomination-update',[HomeController::class,'nomination_update']);
    Route::get('/nomination-commetns',[HomeController::class,'nomination_get_comments']);
});

//project and its  backup routes here
Route::group(['middleware' => ['auth']], function () {
     Route::get('project-backup',[ProjectController::class,'project_backup'])->name('projects.backup');
     //auto backup
     Route::get('auto-project-backup',[ProjectController::class,'auto_project_backup'])->name('autoprojects.backup');
     Route::post('project/genqrcode', [ProjectController::class, 'gen_qrcode'])->name('projects.genqrcode');
     Route::get('project/qrcode/{id}', [ProjectController::class, 'proj_qrcode'])->name('projects.qrcode');
     Route::get('project-docs-get',[ProjectController::class,'project_docs_get'])->name('project.document.get');
     Route::get('project-document/{id}',[ProjectController::class,'project_document'])->name('project-document');
      //qr code details
     Route::get('tempwork-qrcodedetail/{id}',[ProjectController::class, 'qrcode_details'])->name('tempwork.qrcodedetail');
      //get twc according to project
     Route::get('project-get-twc',[ProjectController::class, 'project_twc_get'])->name('project.twc.get');
});

//scaffold routes here
Route::group(['middleware' => ['auth']], function () {
    Route::get('scaffolding-to-load', [TemporaryWorkController::class, 'scaffolding_load'])->name('scaffolding.load');
    Route::post('scaffolding-save', [TemporaryWorkController::class, 'scaffolding_save'])->name('scaffolding.store');
    Route::get('scaffolding-unload/{id}', [TemporaryWorkController::class, 'scaffolding_unload'])->name('scaffold.unload');
    Route::get('scaffolding-close/{id}', [TemporaryWorkController::class, 'scaffolding_close'])->name('scaffold.close');
});

//permit routes hoere
Route::group(['middleware' => ['auth']], function () {
    Route::get('permit-to-load', [TemporaryWorkController::class, 'permit_load'])->name('permit.load');
    Route::post('permit-save', [TemporaryWorkController::class, 'permit_save'])->name('permit.save');
    // Route::get('permit-get', [TemporaryWorkController::class, 'permit_get'])->name('permit.get');
    Route::get('permit-renew/{id}', [TemporaryWorkController::class, 'permit_renew'])->name('permit.renew');
    Route::get('permit-unload/{id}', [TemporaryWorkController::class, 'permit_unload'])->name('permit.unload');
    Route::post('permit-unload-save', [TemporaryWorkController::class, 'permit_unload_save'])->name('permit.unload.save');
    Route::get('permit-close/{id}', [TemporaryWorkController::class, 'permit_close'])->name('permit.close');

    //working for permit edit and update
    Route::get('permit-edit/{id}', [TemporaryWorkController::class, 'permit_edit'])->name('permit.edit');
    Route::post('permit-update', [TemporaryWorkController::class, 'permit_update'])->name('permit.update');
});

//temporary extra routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('temporary_works_shared',[TemporaryWorkController::class,'shared_temporarywork'])->name('temporary_works.shared');
    Route::post('temporary_work_shared_delete',[TemporaryWorkController::class,'Delete_shared_temp'])->name('temporary_works.sharedelete');
    Route::post('temporary_works/uploadfile', [TemporaryWorkController::class, 'temp_file_uplaod'])->name('tempwork.upload');
    //upload photo
    Route::post('temporary_works/uploadphoto', [TemporaryWorkController::class, 'temp_photo_uplaod'])->name('tempwork.upload.photo');
    //get upload photo or document
    Route::get('temporary_works_photo', [TemporaryWorkController::class, 'get_temp_photo'])->name('tempwork.get.photo');
    Route::post('temporary_works/twname', [TemporaryWorkController::class, 'temp_savetwname'])->name('temporarywork.twname');
    Route::get('tempwork-search', [TemporaryWorkController::class, 'tempwork_search'])->name('tempwork.search');
    Route::get('tempwork-project-search', [TemporaryWorkController::class, 'tempwork_project_search'])->name('tempwork.proj.search');
    Route::get('shared-tempwork-project-search', [TemporaryWorkController::class, 'shared_tempwork_project_search'])->name('sharedtempwork.proj.search');
    Route::get('shared_tempwork-send-attach/{id}', [TemporaryWorkController::class, 'tempwork_send_attach'])->name('tempwork.sendattach');
    //export to excel
    Route::get('temporary-work-export', [TemporaryWorkController::class, 'export_excel'])->name('Designbrief.export');
});

//designer routes
Route::group(['prefix'=>'designer','middleware' => ['auth']], function () {
     //designer user crud routes
     Route::get('/list',[DesignerController::class,'List'])->name('designer.list');
     Route::get('/create',[DesignerController::class,'Create'])->name('designer.create');
     Route::post('/save',[DesignerController::class,'Save'])->name('designer.save');
     Route::get('/edit/{id}',[DesignerController::class,'Edit'])->name('designer.edit');
     Route::put('/update/{user}',[DesignerController::class,'Update'])->name('designer.update');
     Route::delete('/destroy/{user}',[DesignerController::class,'Destroy'])->name('designer.destroy');
     //get designs that uploaded
     Route::get('get-designs',[DesignerController::class,'get_desings'])->name('get-designs');
     Route::post('share-drawing',[DesignerController::class,'share_drawing'])->name('drawing.share');
     Route::post('share-drawing-checker',[DesignerController::class,'share_drawing_checker'])->name('drawingchecker.share');
     Route::get('get_share-drawing',[DesignerController::class,'get_share_drawing'])->name('get.share.drawings');
     Route::post('reply-drawing',[DesignerController::class,'reply_drawing'])->name('drawing.reply');
     Route::get('get-reply-drawing',[DesignerController::class,'get_reply_drawing'])->name('get.reply.drawings');
     //get risk assessment
     Route::get('get-risk-assessment',[DesignerController::class,'get_assessment'])->name('get.assessment');
     //get rejected design briefs
     Route::get('get-rejected-designs',[DesignerController::class,'get_rejected_designbrief'])->name('rejected.designs');
     //change emails
     Route::post('change-emails',[DesignerController::class,'change_email'])->name('change-email');
     Route::get('get-changed-emails-history',[DesignerController::class,'change_email_history'])->name('change-email-history');
});


Route::get('/dashboard',[ProjectController::class,'Dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

//For local, not for production
//Run fresh migration and seeder
if (env('Enable_Migration_Optimize_Clear_Routes') == true) {
    Route::get('run-migrations', function () {
        Artisan::call('migrate:fresh --seed');
        dd('migration and seeder done');
    });
    Route::get('optimize', function () {
        Artisan::call('optimize:clear');
        dd('optimize done');
    });
}
