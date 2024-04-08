<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return redirect()->route('form.login');
});

Route::controller(CustomAuthController::class)->group(function(){
    route::get('/login', 'login')
    ->name('form.login')->middleware('AlreadyLoggedIn');
    route::get('/registration', 'registration')
    ->name('form.registration')->middleware('AlreadyLoggedIn');
    route::post('/register-user', 'registerUser')->name('register.user');
    route::post('/login-user', 'loginUser')->name('login.user');
    route::get('/index', 'index')
    ->middleware('isLoggedIn');
    route::post('/logout', 'logout')->name('logout.user');
});

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::controller(TaskController::class)->group(function(){
    Route::prefix('tasks')->group(function(){
        Route::get('/', 'tasksIndex')->name('tasks.index')->middleware('isLoggedIn');
        Route::get('/{task}', 'tasksShow')->name('tasks.show')->middleware('isLoggedIn');
        Route::get('/{task}/edit', 'tasksEdit')->name('tasks.edit')->middleware('isLoggedIn');
        Route::post('/', 'tasksStore')->name('tasks.store')->middleware('isLoggedIn');
        Route::put('/{task}', 'tasksUpdate')->name('tasks.update')->middleware('isLoggedIn');
        Route::delete('/{task}', 'taskDestroy')->name('task.destroy')->middleware('isLoggedIn');
        Route::put('/{task}/toggle-complete', 'tasksToggleComplete')->name('tasks.toggle-complete')->middleware('isLoggedIn');
        Route::put('/{task}/toggle-important', 'tasksToggleImportant')->name('tasks.toggle-important')->middleware('isLoggedIn');
    });
});

// Route::fallback(function(){
//     return "This page is not exist.";
// });

