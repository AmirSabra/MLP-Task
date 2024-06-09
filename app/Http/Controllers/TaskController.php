<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Main Page
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', ['tasks' => $tasks]);
    }
    // Function to Create a Task
    public function create(Request $request)
    {
        $taskName = $request->name;
        $existingTask = Task::where('name', $taskName)->first();
        if ($existingTask) {
            return redirect('/')->with('error', 'Task with same name already exists');
        } else {
            $task = new Task;
            $task->name = $taskName;
            $task->save();
            return redirect('/')->with('success', 'Task has been created successfully');
        }
    }

    // Function to Mark a Task as Complete with the Task ID as a Parameter
    public function markAsComplete($taskId)
    {
        $task = Task::where('id', $taskId)->update(['completed' => 1]);
        if ($task) {
            return redirect('/')->with('success', 'Task has been marked as complete successfully');
        } else {
            return redirect('/')->with('error', 'Task has could not be found');
        }        
    }

    // Function to Delete the Task with the Task ID as the Parameter
    public function delete($taskId)
    {
        $task = Task::where('id', $taskId)->delete();
        if ($task) {
            return redirect('/')->with('success', 'Task has been deleted successfully');
        } else {
            return redirect('/')->with('error', 'Task has could not be found');
        }
    }
}
