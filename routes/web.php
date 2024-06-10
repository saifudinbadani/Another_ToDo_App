<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Symfony\Contracts\Service\Attribute\Required;

Route::get('/', function () {
    $tasks = Task::all();
    return view('task', ['tasks' => $tasks] );
    
});

Route::post('/', function (){
    request()->validate([
        'title' => ['required', 'max:20'],
        'description' => ['required', 'max:20'],
        'priority' => ['required'],
    ]);

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
    return redirect('/');
});

Route::patch('/{id}', function ($id){
    $task = Task::findOrFail($id);
    $task->title = request('title');
    $task->description = request('description');
    $task->priority = request('priority');
    $task->save();
    return redirect('/');
});