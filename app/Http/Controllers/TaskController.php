<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View as View;

class TaskController extends Controller
{
    public function viewTasks(): View
    {
        $tasks = Task::all();
        return view('task', ['tasks' => $tasks]);
    }

    public function createTask()
    {
        request()->validate([
            'title' => ['required', 'max:20'],
            'description' => ['required', 'max:20'],
            'priority' => ['required'],
        ]);

        Task::create([
            'title' => request('title'),
            'description' => request('description'),
            'priority' => request('priority')
        ]);
        return redirect('/');
    }

    public function updateTask($id)
    {
        request()->validate([
            'title' => ['required', 'max:20'],
            'description' => ['required', 'max:20'],
            'priority' => ['required'],
        ]);
        $task = Task::findOrFail($id);
        $task->title = request('title');
        $task->description = request('description');
        $task->priority = request('priority');
        $task->save();
        return redirect('/');
    }

    public function deleteTask($id)
    {
        Task::findOrFail($id)->delete();
        return redirect('/');
    }
}
