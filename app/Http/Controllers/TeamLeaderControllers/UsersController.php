<?php

namespace App\Http\Controllers\TeamLeaderControllers;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\TeamLeader;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $items = User::with('leader')->where('leader_id', auth('leader')->id())->orderBy('id', 'desc')->get();
        return view('TeamLeader.users.index', compact('items'));
    }

    public function create() {
        return view('TeamLeader.users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'required',
        ]);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . rand(10000, 10000000) . $extension;
            $destinationPath = base_path(). '/public/users' ;
            $file->move($destinationPath, $fileName);
            User::create($request->except(['password', 'avatar']) + ['password' => bcrypt($request->post('password')), 'avatar' => $fileName, 'leader_id' => auth('leader')->id()]);
        } else {
            User::create($request->except(['password', 'avatar']) + ['password' => bcrypt($request->post('password')), 'leader_id' => auth('leader')->id()]);
        }
        session()->flash('success', 'User Created Successfully');
        return redirect(url('leader/users'));
    }

    public function edit($id) {
        $item = User::findOrFail($id);
        return view('TeamLeader.users.edit', compact('item'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $TeamLeader = User::findOrFail($id);
        if ($request->has('password') and $request->post('password') != null and $request->post('password') != '') {
            $TeamLeader->update([
                'password' => bcrypt($request->post('password')),
            ]);
        }
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . rand(10000, 10000000) . $extension;
            $destinationPath = base_path(). '/public/users' ;
            $file->move($destinationPath, $fileName);
            $TeamLeader->update($request->except(['password', 'avatar']) + ['avatar' => $fileName]);
        } else {
            $TeamLeader->update($request->except(['password', 'avatar']));
        }
        session()->flash('success', 'User Created Successfully');
        return redirect(url('leader/users'));
    }

    public function delete($id) {
        $item = User::findOrFail($id);
        $item->delete();
        session()->flash('success', 'User Deleted Successfully');
        return redirect(url('leader/users'));
    }
}
