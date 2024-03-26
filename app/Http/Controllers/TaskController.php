<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function tasksIndex() {
        return view('index', ['tasks' => Task::latest()->paginate(10)]); 
    }

    public function tasksShow(Task $task) {
        return view('show', ['task' => $task]);
    }

    public function tasksEdit(Task $task) {
        return view('edit', ['task' => $task]);
    }

    public function tasksStore(TaskRequest $request){
        $task = Task::create($request->validated());

        return redirect()->route('tasks.index', ['task'=>$task->id])->with('success', 'Task created successfully');
    }

    public function tasksUpdate(Task $task, TaskRequest $request){
        $task->update($request->validated());

        return redirect()->route('tasks.show', ['task'=>$task->id])
        ->with('success', 'Task updated successfully');
    }

    public function taskDestroy(Task $task) {
        $task->delete();

        return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully');
    }

    public function tasksToggleComplete(Task $task) {
        $task->toggleComplete();
        return redirect()->back()->with('success', 'Task updated successfully');
    }

}
