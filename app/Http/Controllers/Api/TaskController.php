<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {

        $tasks = Task::all();

        return TaskResource::collection($tasks);

    }

    public function update(Request $request, Task $task)
    {

        $this->authorize('update', $task);
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);



        $task->update($data);

        return TaskResource::make($task);
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return response()->noContent();
    }
}
