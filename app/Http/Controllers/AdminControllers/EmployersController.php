<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;

class EmployersController extends Controller
{
    public function index() {
        $items = Leader::orderBy('id', 'desc')->get();
        return view('admin.employer.index', compact('items'));
    }

    public function create() {
        return view('admin.employer.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'job_name' => 'required',
            'avatar' => 'required',
            'mobile' => 'required',
        ]);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . rand(10000, 10000000) . $extension;
            $destinationPath = base_path(). '/public/employers' ;
            $file->move($destinationPath, $fileName);
            Leader::create($request->except(['password', 'avatar']) + ['password' => bcrypt($request->post('password')), 'avatar' => $fileName]);
        } else {
            Leader::create($request->except(['password', 'avatar']) + ['password' => bcrypt($request->post('password'))]);
        }
        session()->flash('success', 'Employer Created Successfully');
        return redirect(url('admin/employer'));
    }

    public function edit($id) {
        $leader = Leader::findOrFail($id);
        return view('admin.employer.edit', compact('leader'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'job_name' => 'required',
            'mobile' => 'required',
        ]);
        $leader = Leader::findOrFail($id);
        if ($request->has('password') and $request->post('password') != null and $request->post('password') != '') {
            $leader->update([
                'password' => bcrypt($request->post('password')),
            ]);
        }
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . rand(10000, 10000000) . $extension;
            $destinationPath = base_path(). '/public/employers' ;
            $file->move($destinationPath, $fileName);
            $leader->update($request->except(['password', 'avatar']) + ['avatar' => $fileName]);
        } else {
            $leader->update($request->except(['password', 'avatar']));
        }
        session()->flash('success', 'Employer Created Successfully');
        return redirect(url('admin/employer'));
    }

    public function delete($id) {
        $leader = Leader::findOrFail($id);
        $leader->delete();
        session()->flash('success', 'Employer Deleted Successfully');
        return redirect(url('admin/employer'));
    }
}
