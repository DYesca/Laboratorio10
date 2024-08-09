<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Models\User;


class UserTaskController extends Controller
{
    public function index(User $user)
    {
        
        return TaskResource::collection($user->tasks);
    } 
}
