<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\ProgramCategoryController;
use App\Http\Controllers\Backend\ProgramController;
use App\Http\Controllers\Frontend\FrontendEventController;
use App\Http\Controllers\Frontend\FrontendParticipantController;
use App\Http\Controllers\Frontend\IndexController;

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


// Route::get('/', function () {
//     return view('frontend.index');
// });

// admin:admin -> adalah merupakan middleware
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

// PROTECT WITH MIDDLEWARE
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    // ADMIN ALL ROUTES
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    // profile
    Route::get('/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');

    // password
    Route::get('/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminProfileController::class, 'adminUpdatePassword'])->name('admin.update.password');

    Route::resource('/program-category', ProgramCategoryController::class);
    Route::post('/program-category/forceDelete/{id}/', [ProgramCategoryController::class, 'forceDelete'])->name('program-category.force-delete');
    Route::post('/program-category/restore/{id}/', [ProgramCategoryController::class, 'restore'])->name('program-category.restore');

    Route::resource('/programs', ProgramController::class);
    Route::get('/inactive/{id}', [ProgramController::class, 'programInactive'])->name('program.inactive');
    Route::get('/active/{id}', [ProgramController::class, 'programActive'])->name('program.active');

    Route::resource('/events', EventController::class);
    Route::get('/inactive/{id}', [EventController::class, 'eventInactive'])->name('event.inactive');
    Route::get('/active/{id}', [EventController::class, 'eventActive'])->name('event.active');
}); // END MIDDLEWARE


Route::get('/', [IndexController::class, 'index'])->name('frontend.index');
Route::get('/programs', [IndexController::class, 'programs'])->name('frontend.programs');
Route::get('/programs/{id}', [IndexController::class, 'programsShow'])->name('frontend.programs.show');

Route::get('/events', [FrontendEventController::class, 'index'])->name('frontend.events');
Route::get('/events/{id}', [FrontendEventController::class, 'eventsShow'])->name('frontend.events.show');

Route::resource('/participants', FrontendParticipantController::class);


// kata admin setelah sacntum adalah nama guard
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');

// kata web setelah sacntum adalah nama guard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('frontend.index');
})->name('dashboard');
