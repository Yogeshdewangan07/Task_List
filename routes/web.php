<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return redirect()->route('tasks.index');
});

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::controller(TaskController::class)->group(function(){
    Route::prefix('tasks')->group(function(){
        Route::get('/', 'tasksIndex')->name('tasks.index');
        Route::get('/{task}', 'tasksShow')->name('tasks.show');
        Route::get('/{task}/edit', 'tasksEdit')->name('tasks.edit');
        Route::post('/', 'tasksStore')->name('tasks.store');
        Route::put('/{task}', 'tasksUpdate')->name('tasks.update');
        Route::delete('/{task}', 'taskDestroy')->name('task.destroy');
        Route::put('/{task}/toggle-complete', 'tasksToggleComplete')->name('tasks.toggle-complete');
    });
});

Route::fallback(function(){
    return "This page is not exist.";
});

