<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $tasks = Task::all();
    // dd($tasks[0]->description);

    return view('task', ['tasks' => $tasks] );
    
});

Route::post('/', function (){

    Task::create([
        'title'=> request('title'),
        'description' => request('description'),
        'priority' => request('priority')
    ]);

    $tasks = Task::all();
    return view('task', ['tasks' => $tasks] );
});

Route::delete('/{id}', function ($id){
    Task::findOrFail($id)->delete();
    $tasks = Task::all();
    return view('task', ['tasks' => $tasks] );
});

// Route::put('/', 'task');