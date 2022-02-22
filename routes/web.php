<?php

use App\Http\Controllers\admin\adminAjaxController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\LeadController;
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

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::GET('/admin/login', [AdminController::class, 'loginIndex'])->name('admin.index');
Route::POST('/admin/login', [AdminController::class, 'loginStore'])->name('admin.store');
Route::GET('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::GET('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::POST('/admin/updateLeadPassword', [LeadController::class, 'updateLeadPassword'])->name('admin.updateLeadPassword');
Route::POST('/admin/failedLead', [LeadController::class, 'failedLead'])->name('admin.failedLead');


/*
|--------------------------------------------------------------------------
| Manager
|--------------------------------------------------------------------------
*/

Route::GET('/admin/addmanager', [AdminController::class, 'addManagerIndex'])->name('admin.addManagerIndex');
Route::POST('/admin/addmanager', [AdminController::class, 'addManagerStore'])->name('admin.addManagerStore');
Route::GET('/admin/listmanager', [AdminController::class, 'listManagerIndex'])->name('admin.listManagerIndex');
Route::POST('/admin/updatemanager', [adminAjaxController::class, 'updateManager'])->name('admin.updateManager');
Route::POST('/admin/updatePassword', [adminAjaxController::class, 'updatePassword'])->name('admin.updatePassword');
Route::POST('/admin/deletedata', [adminAjaxController::class, 'deleteData'])->name('admin.deleteData');

/*
|--------------------------------------------------------------------------
| Leads
|--------------------------------------------------------------------------
*/

Route::GET('/admin/addlead', [LeadController::class, 'addLeadIndex'])->name('admin.addLeadIndex');
Route::GET('/admin/listlead', [LeadController::class, 'listLeadIndex'])->name('admin.listLeadIndex');
Route::POST('/admin/addlead', [LeadController::class, 'addLeadStore'])->name('admin.addLeadStore');
Route::POST('/admin/leads/addcounter', [LeadController::class, 'addCounter'])->name('admin.addCounter');
Route::GET('/admin/updatelead/{id}', [LeadController::class, 'getupdatelead'])->name('admin.getupdatelead');
Route::POST('/admin/updatelead', [LeadController::class, 'updatelead'])->name('admin.updatelead');
Route::GET('/admin/movecontact/{id}', [ContactController::class, 'moveleads'])->name('admin.moveleads');
Route::POST('/admin/movecontactAdd', [ContactController::class, 'moveleadsAdd'])->name('admin.moveleadsAdd');


Route::GET('/admin/addfilter', [LeadController::class, 'addfilter'])->name('admin.addfilter');
Route::POST('/admin/addfilter', [LeadController::class, 'addfilterPOST'])->name('admin.addfilter');






// Route::GET('/admin/addlead', [AdminController::class, 'addLead'])->name('admin.addlead');
// Route::GET('/admin/lislead', [AdminController::class, 'listLead'])->name('admin.listlead');