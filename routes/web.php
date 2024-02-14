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
    Route::get('/classes',[ClassesController::class,'AllClasses'])->name('classes');
    Route::get('/create-class',[ClassesController::class,'create'])->name('create-class');
    Route::post('/store-class',[ClassesController::class,'store'])->name('store-class');
    Route::get('/edit-class/{id}',[ClassesController::class,'edit'])->name('edit-class');
    Route::post('/update-class',[ClassesController::class,'update'])->name('update-class');
    Route::get('/delete/{id}',[ClassesController::class,'delete'])->name('delete-class');




    Route::get('/teachers',[TeacherController::class,'allTeachers'])->name('teachers');
    Route::get('/teacher-create',[TeacherController::class,'create'])->name('teacher-create');
    Route::post('/store-teacher',[TeacherController::class,'store'])->name('store-teacher');


  
  

    
});


