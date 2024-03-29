<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Task $task)
    {

        return view('tasks.show', compact('task'));
    }
}
