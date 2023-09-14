<?php

namespace App\Http\Controllers\TeamLeaderControllers;

use App\Http\Controllers\Controller;
use App\Models\TeamLeader;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $items = Project::withCount('tasks')->orderBy('id', 'desc')->where('leader_id', auth('leader')->id())->get();
        return view('TeamLeader.projects.index', compact('items'));
    }

    public function create()
    {
        return view('TeamLeader.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        Project::create($request->except('status') + ['status' => $request->post('status') == '1' ? 1 : 0, 'leader_id' => auth('leader')->id()]);
        session()->flash('success', 'Project Created Successfully');
        return redirect(url('leader/projects'));
    }

    public function edit($id)
    {
        $item = Project::findOrFail($id);
        return view('TeamLeader.projects.edit', compact('item'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $TeamLeader = Project::findOrFail($id);
        $TeamLeader->update($request->except('status') + ['status' => $request->post('status') == '1' ? 1 : 0]);
        session()->flash('success', 'Project Created Successfully');
        return redirect(url('leader/projects'));
    }

    public function delete($id)
    {
        $item = Project::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Project Deleted Successfully');
        return redirect(url('leader/projects'));
    }
}
