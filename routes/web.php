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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

///////////////////ADMIN DASHBOARD ////////////////////
Route::prefix('details')->name('admin.')->group(function(){
    Route::get('/students-profiles',[UsersProfilesController::class,'show'])->name('users-profiles');
    Route::get('/create-student',[UsersProfilesController::class,'create'])->name('student-create');
    Route::post('/store-student',[UsersProfilesController::class,'store'])->name('store-student');

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
    Route::get('/teachers',[TeacherController::class,'allTeachers'])->name('teachers');
    Route::get('/teacher-create',[TeacherController::class,'create'])->name('teacher-create');
    Route::post('/store-teacher',[TeacherController::class,'store'])->name('store-teacher');
    Route::get('/edit-teacher/{id}',[TeacherController::class,'edit'])->name('edit-teacher');
    Route::post('/update-teacher',[TeacherController::class,'update'])->name('update-teacher');
    Route::get('/delete-teacher/{id}',[TeacherController::class,'delete'])->name('delete-teacher');
  
  

    
});


