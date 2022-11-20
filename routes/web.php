<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
       
Route::prefix('cms/')->middleware('guest:admin,user')->group(function () {
    Route::get('{guard}/login', [AuthController::class, 'showLoginView'])->name('cms.login');
    Route::post('login', [AuthController::class, 'login']);
    // Route::view('login', 'controlpanel.auth.login')->name('cms.login');

});

// Route::prefix('fromto-app')->group(function () {
//     // Route::get('/', [DetailController::class ,'index'])->name('app.index');
//     Route::get('/',[ DetailController::class,'index'])->name('app.index');
//     Route::post('/contacts', [ContactController::class ,'store'])->name('contacts.store');
//     Route::get('/contacts/create', [ContactController::class ,'create'])->name('contacts.create');
//     Route::get('/parent',[SettingController::class ,'index']);
//     Route::view('/about','fromto-app.about')->name('app.about');
//     Route::view('/privacy','fromto-app.privacy')->name('app.privacy');
//     Route::view('/contact','fromto-app.contact')->name('app.contact');



// });
Route::group([
    'prefix' => LaravelLocalization::setlocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
],function(){

    Route::prefix('fromto-app')->group(function () {
        // Route::get('/', [DetailController::class ,'index'])->name('app.index');
        Route::get('/',[ DetailController::class,'index'])->name('app.index');
        Route::post('/contacts', [ContactController::class ,'store'])->name('contacts.store');
        Route::get('/contacts/create', [ContactController::class ,'create'])->name('contacts.create');
        Route::get('/parent',[SettingController::class ,'index']);
        Route::get('/about',[ AboutController::class,'index'])->name('app.about');
        Route::view('/privacy','fromto-app.privacy')->name('app.privacy');
        Route::view('/contact','fromto-app.contact')->name('app.contact');
    
    
    
    });

    Route::prefix('cms/admin')->middleware(['auth:admin'])->group(function () {
        Route::resource('admins', AdminController::class);
        Route::get('profile/personal', [AuthController::class, 'profilePersonalInformation'])->name('cms.profile.personal-information');
        
        Route::resource('services', ServiceController::class);
        Route::resource('partners', PartnerController::class);
        Route::resource('details', DetailController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('answers', AnswerController::class);
        Route::resource('settings', SettingController::class);
        Route::get('/contacts', [ContactController::class ,'index'])->name('contacts.index');

        
        Route::get('logout', [AuthController::class, 'logout'])->name('cms.logout');

        Route::view('/', 'controlPanel.parent');
});

Route::prefix('cms/admin')->middleware(['auth:admin'])->group(function () {

    Route::get('admins/{admin}/permissions/edit', [AdminController::class, 'editAdminPermissions'])->name('admin.edit-permissions');
    Route::put('admins/{admin}/permissions/edit', [AdminController::class, 'updateAdminPermissions']);
});

  
});
// Route::get('/', function () {
//     return view('controlPanel.parent');
// });
