<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\UsersProfilesController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\TeacherController;


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

Route::prefix('user')->name('front.')->group(function(){
    Route::get('/',FrontHomeController::class)->name('index')->middleware('auth');
    
});

require __DIR__.'/auth.php';

//-----------ADMIN DASHBOARD---------------////


Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',AdminHomeController::class)->name('index');
    Route::view('/login','admin.auth.login');
    Route::view('/register','admin.auth.register');
    Route::view('/forget-password','admin.auth.forget-password');

    require __DIR__.'/AdminAuth.php';
});



Route::get('/', function () {
    return view('welcome');
});


///////////////////ADMIN DASHBOARD ////////////////////
Route::prefix('details')->name('admin.')->group(function(){
    Route::controller(UsersProfilesController::class)->prefix('students')->group(function(){
        Route::get('/','index')->name('profiles');
        Route::get('/create','create')->name('student-create');
        Route::post('/store','store')->name('store-student');

    });
    
//CLASSES ALL CRUD 
Route::controller(ClassesController::class)->prefix('classes')->group(function(){
    Route::get('/','index')->name('classes');
    Route::view('/create','classes.class_create')->name('create-class');
    Route::post('/store','store')->name('store-class');
    Route::get('/{id}/edit','edit')->name('edit-class');
    Route::post('/update','update')->name('update-class');
    Route::get('/delete/{id}','delete')->name('delete-class');
});
   



//Teacher ALL CRUD
 Route::controller(TeacherController::class)->prefix('teachers')->group(function(){
     Route::get('/','index')->name('teachers');
    Route::view('/create','teachers.teacher_create')->name('teacher-create');
    Route::post('/store','store')->name('store-teacher');
    Route::get('/{id}/edit','edit')->name('edit-teacher');
    Route::post('/update','update')->name('update-teacher');
    Route::get('/delete/{id}','delete')->name('delete-teacher');
  
 });   
   
  

    
});


