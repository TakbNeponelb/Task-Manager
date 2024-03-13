<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Task $task)
    {
        $task->delete();
        $tasks = Task::paginate(10);
        return redirect()->route('task.index', compact('tasks'));
    }
}
