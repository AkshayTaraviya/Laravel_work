<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\JuniorController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', [CollectionController::class, 'index']);

Route::resource('juniors', JuniorController::class);

Route::resource('books', BookController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

Route::redirect('home','dashboard');
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('sendMail',[SendMailController::class, 'index'])->name("sendMail");

Route::get('importExportView', [ExcelController::class, 'importExportView'])->name('importExportView');
Route::get('export', [ExcelController::class, 'export'])->name('export');
Route::post('import', [ExcelController::class, 'import'])->name('import');


