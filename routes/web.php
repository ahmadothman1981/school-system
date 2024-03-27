<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\HomeworkController;




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
    Route::controller(StudentController::class)->prefix('students')->group(function(){
        Route::get('/','index')->name('profiles');
        Route::get('/create','create')->name('student-create');
        Route::post('/store','store')->name('store-student');
        Route::get('/{id}/edit','edit')->name('edit-student');
        Route::post('/update','update')->name('update-student');
        Route::get('/delete/{id}','delete')->name('delete-student');
        Route::get('/{id}/show','show')->name('show-student');

    });
    
//CLASSES ALL CRUD 
Route::controller(ClassesController::class)->prefix('classes')->group(function(){
    Route::get('/','index')->name('classes');
    Route::view('/create','classes.class_create')->name('create-class');
    Route::post('/store','store')->name('store-class');
    Route::get('/{id}/edit','edit')->name('edit-class');
    Route::post('/update','update')->name('update-class');
    Route::get('/delete/{id}','delete')->name('delete-class');
    Route::get('/{id}/show','show')->name('show-class');
});
   



//Teacher ALL CRUD
 Route::controller(TeacherController::class)->prefix('teachers')->group(function(){
     Route::get('/','index')->name('teachers');
    Route::view('/create','teachers.teacher_create')->name('teacher-create');
    Route::post('/store','store')->name('store-teacher');
    Route::get('/{id}/edit','edit')->name('edit-teacher');
    Route::post('/update','update')->name('update-teacher');
    Route::get('/delete/{id}','delete')->name('delete-teacher');
    Route::get('/{id}/show','show')->name('show-teacher');
  
 }); 
 
 //Subject All Crud
 Route::controller(SubjectController::class)->prefix('subjects')->group(function(){
    Route::get('/','index')->name('subjects');  
   Route::get('/create','create')->name('subject-create');
   Route::post('/store','store')->name('store-subject');
   Route::get('/{id}/edit','edit')->name('edit-subject');
   Route::post('/update','update')->name('update-subject');
   Route::get('/delete/{id}','delete')->name('delete-subject');
   Route::get('/{id}/show','show')->name('show-subjects');
 
});   
  
//Homework All Crud
Route::controller(HomeworkController::class)->prefix('homework')->group(function(){
    Route::get('/','index')->name('homework');
    Route::get('/create','create')->name('assignment-create'); 
    Route::post('/store','store')->name('store-assignment'); 
    Route::get('/{id}/edit','edit')->name('edit-assignment');
    Route::post('/update','update')->name('update-assignment');
    Route::get('/delete/{id}','delete')->name('delete-asignment');
    Route::get('/{id}/show','show')->name('show-assignment');
   
 
});   
    
});


