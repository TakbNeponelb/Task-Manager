<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Priority;
use App\Models\Task;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Task $task)
    {
        $users = User::all();
        $priorities = Priority::all();
        return view('tasks.edit', compact('task', 'users', 'priorities'));
   
    }
}
