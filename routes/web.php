<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $tasks = Task::all();
    return view('task', ['tasks' => $tasks] );
    
});

//Update task
Route::get('/{id}', function ($id){
    $task = Task::find($id);
    return back();
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

Route::patch('/{id}', function ($id){
    $task = Task::findOrFail($id);
    $task->title = request('title');
    $task->description = request('description');
    $task->priority = request('priority');
    $task->save();
    return redirect('/');
});