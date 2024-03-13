<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Filters\TaskFilter;
use App\Models\Task;
use App\Http\Requests\Task\FilterRequest;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        
        $filter = app()->make(TaskFilter::class, ['queryParams' => array_filter($data)]);

        $tasks = Task::filter($filter)->paginate(10);
        
        return view('tasks.index', compact('tasks'));
    }
}
