<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {
        $items = Project::withCount('tasks')->with('leader')->orderBy('id', 'desc')->get();
        return view('admin.projects.index', compact('items'));
    }

    public function create() {
        $leaders = Leader::all();
        if (!$leaders->count()) {
            return back();
        }
        return view('admin.projects.create', compact('leaders'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'leader_id' => 'required',
            'status' => 'required',
        ]);
            Project::create($request->except('status') + ['status' => $request->post('status') == '1'? 1 : 0]);
        session()->flash('success', 'Project Created Successfully');
        return redirect(url('admin/projects'));
    }

    public function edit($id) {
        $leaders = Leader::all();
        if (!$leaders->count()) {
            return back();
        }
        $item = Project::findOrFail($id);
        return view('admin.projects.edit', compact('item', 'leaders'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'leader_id' => 'required',
            'status' => 'required',
        ]);
        $leader = Project::findOrFail($id);
            $leader->update($request->except('status') + ['status' => $request->post('status') == '1'? 1 : 0]);
        session()->flash('success', 'Project Created Successfully');
        return redirect(url('admin/projects'));
    }

    public function delete($id) {
        $item = Project::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Project Deleted Successfully');
        return redirect(url('admin/projects'));
    }
}
