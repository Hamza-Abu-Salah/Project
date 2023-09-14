<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\TeamLeader;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $items = Project::with('tasks')->orderBy('id', 'desc')->where('leader_id', auth('leader')->id())->get();
        foreach ($items as $item) {
            $item->tasks = $item->tasks()->whereDoesntHave('user_task', function ($query) {
                $query->where('user_id', auth()->id());
            });
        }
        return view('user.projects.index', compact('items'));
    }
}
