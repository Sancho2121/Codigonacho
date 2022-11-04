<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\AppSetting;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\User\RoleList;
use App\Http\Livewire\User\UserEdit;
use App\Http\Livewire\User\UserList;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\ClientEdit;
use App\Http\Livewire\Client\ClientTable;
use App\Http\Livewire\Project\ProjectEdit;
use App\Http\Livewire\Project\ProjectTable;
use App\Http\Controllers\DocumentController;
use App\Http\Livewire\Supplier\SupplierEdit;
use App\Http\Livewire\Supplier\SupplierList;

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
//Route::get('login', App\Http\Livewire\Template\Login::class)->name('login');
// Example Routes
Route::view('/', 'landing');
//Route::match(['get', 'post'], '/dashboard', function(){
    //return view('dashboard');
//});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('users', UserList::class)->name('users')->middleware('can:administrador.read');
    Route::get('users/{user}/edit', UserEdit::class)->name('users.edit')->middleware('can:administrador.update');
    Route::get('roles', RoleList::class)->name('roles')->middleware('can:administrador.read');
    Route::get('settings/{setting}', AppSetting::class)->name('settings')->middleware('can:administrador.read');
    Route::get('clients', ClientTable::class)->name('clients')->middleware('can:administrador.read');
    Route::get('clients/{client}/edit', ClientEdit::class)->name('clients.edit')->middleware('can:administrador.update');
    Route::get('projects/{type_project}', ProjectTable::class)->name('projects')->middleware('can:administrador.read');
    Route::get('projects/{project}/edit', ProjectEdit::class)->name('projects.edit')->middleware('can:administrador.update');
    Route::get('document/{document}/show', [DocumentController::class, 'show'])->name('document.show');
    Route::get('document/{document}/download', [DocumentController::class, 'download'])->name('document.download');
    Route::get('document/{project}/levantamiento', [DocumentController::class, 'imprimir'])->name('document.levantamiento');
    Route::get('suppliers', SupplierList::class)->name('suppliers');
    Route::get('supplier/{supplier}/edit', SupplierEdit::class)->name('supplier.edit');
});
