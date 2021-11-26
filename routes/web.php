<?php

use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProjectController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addProject', function () {
    return view('dashboard/projects/create');
});
Route::get('/addUser', function () {
    return view('dashboard/users/create');
});
Route::view('/companies/index','dashboard/companies/index');
Route::view('/companies/create','dashboard/companies/create');
Route::view('/temporary-works/index','dashboard/temporary_works/index');
Route::view('/temporary-works/create','dashboard/temporary_works/create');
Route::get('/temporaryWork', function () {
    return view('dashboard/admin/screens/temporary-work');
});
Route::get('/designRelief', function () {
    return view('dashboard/screens/new-design-relief');
});
Route::group(['middleware' => ['auth']], function() {
    //All Resource Controller
    Route::resources([
//        'roles' => RoleController::class, //Roles and permissions
        'users' => UserController::class, //Company users
        'projects' => ProjectController::class, //Projects
        'companies' => CompanyController::class, //Companies
    ]);

    Route::get('company/projects',[CompanyController::class,'companyProjects'])->name('company.projects');
    Route::put('user/update/password',[UserController::class,'updatePassword'])->name('users.updatePassword');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//For local, not for production
//Run fresh migration and seeder
if (env('Enable_Migration_Optimize_Clear_Routes') == true){
    Route::get('run-migrations', function(){Artisan::call('migrate:fresh --seed');dd('migration and seeder done');});
    Route::get('optimize', function(){Artisan::call('optimize:clear');dd('optimize done');});
}
