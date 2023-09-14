<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\Project;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index() {
        $items = Task::with('project')->orderBy('id', 'desc')->get();
        return view('admin.tasks.index', compact('items'));
    }

    public function users_tasks() {
        $items = UserTask::with('task.project', 'user')->orderBy('id', 'desc')->get();
        foreach ($items as $item) {
            if ($item->start_time == null) {
                $item->time = "Not Started Yet";
            } else {
                $time = time() - intval(($item->start_time?? 0));
                $minutes = gmdate('i', $time);
                $item->time = $minutes;
            }
        }
        return view('admin.tasks.users_tasks', compact('items'));
    }

    public function create() {
        $projects = Project::all();
        return view('admin.tasks.create', compact('projects'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project_id' => 'required',
            'points' => 'required',
        ]);
        Task::create($request->all());
        session()->flash('success', 'Task Created Successfully');
        return redirect(url('admin/tasks'));
    }

    public function edit($id) {
        $projects = Project::all();
        $item = Task::findOrFail($id);
        return view('admin.tasks.edit', compact('item', 'projects'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project_id' => 'required',
            'points' => 'required',
        ]);
        $leader = Task::findOrFail($id);
        $leader->update($request->all());
        session()->flash('success', 'Task Created Successfully');
        return redirect(url('admin/tasks'));
    }

    public function delete($id) {
        $item = Task::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Task Deleted Successfully');
        return redirect(url('admin/tasks'));
    }
}
