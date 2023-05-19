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
use App\Http\Controllers\AdminDesignerController;
use App\Http\Controllers\AdminSupplierController;
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
Route::get('get-emails', [TemporaryWorkController::class, 'get_emails'])->name('temporarywork.get-emails');
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
Route::get('design/permit-unload-approve/{id}',[DesignerController::class,'pc_permit_unload_index'])->name('pc.permit.unload.approved');
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

//company profile
Route::get('company-profile/{id}',[HomeController::class,'companyProfile']);
//=============================================END OPEN ROUTES==========================================================

//Authentic routes================================================================================
Route::group(['middleware' => ['auth']], function () {

    Route::get('test', [TemporaryWorkController::class, 'testIndex']);

    Route::get('temporary_works/create2', [TemporaryWorkController::class, 'create2']);

    //All Resource Controller
    Route::resources([
        //        'roles' => RoleController::class, //Roles and permissions
        'users' => UserController::class, //Company users
        'projects' => ProjectController::class, //Projects
        'companies' => CompanyController::class, //Companies
        'temporary_works' => TemporaryWorkController::class, //Temporary Works
        'suppliers' => SupplierController::class, //Supplier
        'adminDesigner' => AdminDesignerController::class, //Admin Designer controller
        'adminSupplier' => AdminSupplierController::class, //Admin Supplier controller
    ]);
    Route::get('company/projects', [CompanyController::class, 'companyProjects'])->name('company.projects');
    Route::get('user/projects', [UserController::class, 'userProjects'])->name('user.projects');
    Route::get('user/admin/edit/{id}',[UserController::class, 'userAdminEdit'])->name('users.admin.edit');
    Route::put('user/admin/update/{id}',[UserController::class, 'userAdminUpdate'])->name('users.admin.update');
    Route::put('user/update/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::post('company/update/password', [CompanyController::class, 'updatePassword'])->name('company.updatePassword');

    // Route::get('get-comments', [TemporaryWorkController::class, 'get_comments'])->name('temporarywork.get-comments');
    Route::get('file-upload-date', [TemporaryWorkController::class, 'file_upload_dates'])->name('temporarywork.file-upload-dates');
    Route::post('image/delete', [TemporaryWorkController::class, 'delete_image'])->name('delete.image');
    Route::get('/test-list' , [TemporaryWorkController::class , 'testIndexHere']);

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


 
//adminDesigner routes
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['auth','companydesigner']], function () {
            Route::get('admindesigner/designerList',[AdminDesignerController::class,'designerList'])->name('adminDesigner.designerList');
            Route::get('adminDesigner/create-profile/{id}',[AdminDesignerController::class,'createProfile']);
            Route::post('adminDesigner/save-profile',[AdminDesignerController::class,'saveProfile']);
            Route::get('adminDesigner/edit-profile/{id}',[AdminDesignerController::class,'editProfile']);
            Route::post('adminDesigner/update-profile/{editProfile}',[AdminDesignerController::class,'updateProfile']);
            Route::get('adminDesigner/designer-details/{id}',[AdminDesignerController::class,'designerDetails']);
            Route::post('adminDesigner/nomination-status',[AdminDesignerController::class,'nominationStatus']);
            //delete company other docs
            Route::get('adminDesigner/delete/companydoc',[AdminDesignerController::class,'deleteCompnayDocs'])->name('delete.companydocs');
        });
        Route::get('adminDesigner/create-nomination/{id}',[AdminDesignerController::class,'createNomination']);
        Route::post('adminDesigner/save-nomination/{id}',[AdminDesignerController::class,'saveNomination']);
        Route::get('adminDesigner/edit-nomination/{id}',[AdminDesignerController::class,'editNomination']);
        Route::post('adminDesigner/update-nomination/{id}',[AdminDesignerController::class,'updateNomination']);

        Route::get('adminDesigner/create-appointment/{id}',[AdminDesignerController::class,'createAppointment']);
        Route::post('adminDesigner/save-appointment',[AdminDesignerController::class,'saveAppointment']);
    });
//Estimator routes
Route::group(['prefix' => 'Estimator'],function(){
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('estimator',EstimatorController::class); //Estimator
        Route::get('/test',[EstimatorController::class,'testIndex']);
        Route::get('/estimator-designer/details/{id}',[EstimatorController::class,'estimatorQuotationDetails']);
        Route::get('/estimator-designer/comments/{id}',[EstimatorController::class,'estimatorDesignerComments']);
        Route::post('/estimator-designer/comments-save',[EstimatorController::class,'estimatorDesignerCommentsSave']);
        Route::post('/estimator-reply-designer',[EstimatorController::class,'estimatorDesignerReplySave']);
        Route::get('/estimator-approve-details/{id}',[EstimatorController::class,'estimatorApproveDetails']);
        Route::post('/estimator-approve',[EstimatorController::class,'estimatorDesignerApprove']);
        Route::get('/estimator-project-search', [EstimatorController::class, 'estimator_project_search'])->name('estimator.proj.search');
        Route::get('/estimator-search', [EstimatorController::class, 'estimator_search'])->name('estimator.search');

        Route::post('/review/save',[EstimatorController::class,'estimatorReview'])->name('estimator.review');
    });
    //Designer routes where he can price up and comment on brief
    Route::get('estimator-designer/design/{id}',[EstimatorController::class,'estimatorDesigner'])->name('estimator.designer');
    Route::post('designer-quotation/save',[EstimatorController::class,'designerQuotation'])->name('designer.quotation');
    Route::post('designer-review/save',[EstimatorController::class,'designerReview'])->name('designer.review');
    Route::get('designer/read-message',[EstimatorController::class,'readMessage']);
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
    Route::get("test-permit" , [TemporaryWorkController::class, 'test_permit_load']);
    Route::post('permit-save', [TemporaryWorkController::class, 'permit_save'])->name('permit.save');
    // Route::get('permit-get', [TemporaryWorkController::class, 'permit_get'])->name('permit.get');
    Route::get('permit-renew/{id}', [TemporaryWorkController::class, 'permit_renew'])->name('permit.renew');
    Route::get('permit-renew-test/{id}', [TemporaryWorkController::class, 'permit_renew_test'])->name('permit.renew.test');
    Route::get('permit-unload/{id}', [TemporaryWorkController::class, 'permit_unload'])->name('permit.unload');
    Route::get('permit-unload-test/{id}', [TemporaryWorkController::class, 'permit_unload_test']);
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
    Route::post('get-rams', [TemporaryWorkController::class, 'get_rams'])->name('tempwork.getrams');
    
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
     Route::get('/designer',[DesignerController::class,'desginerView']);
     Route::get('/projectAssign', [DesignerController::class,'projectAssign']);
//  Route::get('/designer',[DesignerController::class,'testDesigner']);
     Route::get('/list',[DesignerController::class,'List'])->name('designer.list');
     Route::get('/create',[DesignerController::class,'Create'])->name('designer.create');
     Route::post('/save',[DesignerController::class,'Save'])->name('designer.save');
     Route::get('/edit/{id}',[DesignerController::class,'Edit'])->name('designer.edit');
     Route::put('/update/{user}',[DesignerController::class,'Update'])->name('designer.update');
     Route::delete('/destroy/{user}',[DesignerController::class,'Destroy'])->name('designer.destroy');
     //get designs that uploaded
     Route::get('get-designs',[DesignerController::class,'get_desings'])->name('get-designs');
     Route::get('get-designersinfo',[DesignerController::class,'get_designersinfo'])->name('get-designersinfo');
     Route::post('share-drawing',[DesignerController::class,'share_drawing'])->name('drawing.share');
     Route::post('share-drawing-checker',[DesignerController::class,'share_drawing_checker'])->name('drawingchecker.share');
     Route::post('update-design-checker',[DesignerController::class,'update_drawing_checker'])->name('drawingchecker.update');
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
     //
    //  Route::get('/awarded-estimator',[AdminDesignerController::class,'awardedEstimator']);
    Route::get('/awarded-estimator',[DesignerController::class,'testDesigner']);
     //test designer route starts here
     Route::get('test-designer' , [DesignerController::class , 'testDesigner']);
     Route::get('add-estimator' , [DesignerController::class , 'addEstimator'])->name('add_estimator');

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


