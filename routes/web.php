<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MySupplementProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\MemberStatusController;
use App\Http\Controllers\TrainingProductController;
use App\Http\Controllers\TrainingsellController;
use App\Http\Controllers\SupplementsellController;
use App\Http\Controllers\StaffController;

//home
Route::get('/', [HomeController::class, 'index']);

//regist
Route::get('registration', [AuthController::class, 'registration']);
Route::post('registration_post', [AuthController::class, 'registration_post']);

//login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login_post', [AuthController::class, 'login_post']);

//forgot
Route::get('forgot', [AuthController::class, 'forgot']);
Route::post('forgot_post', [AuthController::class, 'forgot_post']);

//reset
Route::get('reset/{token}', [AuthController::class, 'getReset']);
Route::post('reset_post/{token}', [AuthController::class, 'postReset']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//supplements
Route::resource('mysupplementproducts', MySupplementProductController::class)->middleware(['auth']);

//trainings
Route::resource('trainingproducts', TrainingProductController::class)->middleware(['auth']);


//members
Route::get('members', [MemberController::class, 'index'])->middleware(['auth'])->name('members.index');
Route::get('members/{id}', [MemberController::class, 'show'])->name('members.show');
Route::get('members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('members/{id}', [MemberController::class, 'update'])->name('members.update');
Route::delete('members/{id}', [MemberController::class, 'destroy'])->name('members.destroy');

// Profile Routes
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

//subscriptions
Route::resource('subscriptions', SubscriptionController::class)->middleware(['auth']);

//trainingsells
Route::resource('trainingsells', TrainingsellController::class)->middleware(['auth']);

//supplementsells
Route::resource('supplementsells', SupplementsellController::class)->middleware(['auth']);

//staff
Route::resource('staff', StaffController::class)->middleware(['auth']);

Route::group(['middleware' => 'auth'], function(){ 
    Route::resource('members', MemberController::class)->only(['index', 'show']); 
});

//statusmemberaccesingwebornot
Route::get('/member-status', [MemberStatusController::class, 'index'])->name('member_status.index');
Route::post('/validasi', [MemberController::class, 'validateQRCode'])->name('validasi');
Route::post('member/update-status/{id}', [MemberController::class, 'updateStatus'])->name('member.updateStatus');

//camera_permission
Route::get('camera-permission', function () {
    return view('camera_permission');
})->middleware(['auth'])->name('camera.permission');

Route::get('logout', [AuthController::class, 'logout']);



