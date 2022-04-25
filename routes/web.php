<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\PolyclinicController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorUserController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ChangePasswordController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    return view('auth.login');
});

Auth::routes();


Route::get('home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'hakakses:admin,operator']], function () {

    Route::resource('patient', PatientController::class); //patient route
    Route::get('search/patient', [PatientController::class, 'search'])->name('search.patient');
    Route::resource('action', ActionController::class); //action route
    Route::resource('polyclinic', PolyclinicController::class); //polyclinic route
    Route::resource('medicine', MedicineController::class); //medicine route
    Route::resource('doctor', DoctorController::class);
    Route::resource('visit', VisitController::class);
    Route::resource('medical', MedicalController::class); //medical route
    Route::get('pdf/convert', [MedicalController::class, 'pdfGenerating'])->name('pdf-convert.medical');
    Route::resource('laboratory', LaboratoryController::class);
    Route::get('change-password', [ChangePasswordController::class, 'index']);
    Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password');
});



Route::resource('user-management', UserManagementController::class); //user management route (Admin)

// start login routes
Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
});
Route::group(['prefix' => 'operator', 'middleware' => ['isUser', 'auth']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('operator.dashboard');
    Route::get('profile', [UserController::class, 'operatorProfile'])->name('operator.profile');
});
Route::group(['prefix' => 'doctor-user', 'middleware' => ['isDoctor', 'auth']], function () {
    Route::get('dashboard', [DoctorUserController::class, 'index'])->name('doctor-user.dashboard');
    Route::get('profile', [DoctorUserController::class, 'profile'])->name('doctor-user.profile');
    Route::get('medical', [DoctorUserController::class, 'medicalIndex'])->name('doctor-user.medicalIndex');
    Route::get('check/{id}/edit', [DoctorUserController::class, 'medicalCheck'])->name('doctor-user.medicalCheck');
    Route::put('save-check/{id}', [DoctorUserController::class, 'medicalSave'])->name('doctor-user.medicalSave');
    Route::get('medical-show/{id}', [DoctorUserController::class, 'medicalShow'])->name('doctor-user.medicalShow');
    Route::get('patient', [DoctorUserController::class, 'patientIndex'])->name('doctor-user.patientIndex');
    Route::get('change-password', [ChangePasswordController::class, 'doctorPassword'])->name('doctor-user.doctorPassword');
    Route::post('change-password', [ChangePasswordController::class, 'changeDoctorPassword'])->name('doctor-user.change.password');
});
//routes pdf convert view

// end login routes
