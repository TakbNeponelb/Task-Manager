<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\Task\UpdateRequest;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Task $task)
    {
        $data = $request->validated();
        $task->update($data);
        return redirect()->route('task.show', compact('task'));
    }
}
