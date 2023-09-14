<?php

namespace App\Http\Controllers\TeamLeaderControllers;

use App\Http\Controllers\Controller;
use App\Models\TeamLeader;
use App\Models\Project;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Request $request) {
        if ($request->has('project_id')) {
            $items = Task::with('project')->withCount('user_task')->where('project_id', $request->get('project_id'))->get();
        } else {
            $items = Task::with('project')
                ->whereHas('project', function ($query) {
                    $query->where('leader_id', auth('leader')->id());
                })
                ->withCount('user_task')
                ->orderBy('id', 'desc')->get();
        }
        return view('TeamLeader.tasks.index', compact('items'));
    }

    public function users_tasks() {
        $items = UserTask::with('task.project', 'user')
            ->whereHas('user', function ($query) {
                $query->where('leader_id', auth('leader')->id());
            })
            ->orderBy('id', 'desc')->get();
        foreach ($items as $item) {
            if ($item->status == '1') {
                $time = time() - intval(($item->start_time?? 0));
                $minutes = gmdate('i', $time);
                $item->time = $minutes;
            } else {
                $time = intval(($item->end_time?? 0)) - intval(($item->start_time?? 0));
                $minutes = gmdate('i', $time);
                $item->time = $minutes;
            }
        }
        return view('TeamLeader.tasks.users_tasks', compact('items'));
    }

    public function create() {
        $projects = Project::where('leader_id', auth('leader')->id())->get();
        return view('TeamLeader.tasks.create', compact('projects'));
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
        return redirect(url('leader/tasks'));
    }

    public function edit($id) {
        $projects = Project::where('leader_id', auth('leader')->id())->get();
        $item = Task::findOrFail($id);
        return view('TeamLeader.tasks.edit', compact('item', 'projects'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project_id' => 'required',
            'points' => 'required',
        ]);
        $TeamLeader = Task::findOrFail($id);
        $TeamLeader->update($request->all());
        session()->flash('success', 'Task Created Successfully');
        return redirect(url('leader/tasks'));
    }

    public function delete($id) {
        $item = Task::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Task Deleted Successfully');
        return redirect(url('leader/tasks'));
    }
}
