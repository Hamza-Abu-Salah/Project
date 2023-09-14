<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $items = User::with('leader')->orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('items'));
    }

    public function create() {
        $leaders = Leader::all();
        if (!$leaders->count()) {
            return back();
        }
        return view('admin.users.create', compact('leaders'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'required',
            'leader_id' => 'required',
        ]);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . rand(10000, 10000000) . $extension;
            $destinationPath = base_path(). '/public/users' ;
            $file->move($destinationPath, $fileName);
            User::create($request->except(['password', 'avatar']) + ['password' => bcrypt($request->post('password')), 'avatar' => $fileName]);
        } else {
            User::create($request->except(['password', 'avatar']) + ['password' => bcrypt($request->post('password'))]);
        }
        session()->flash('success', 'User Created Successfully');
        return redirect(url('admin/users'));
    }

    public function edit($id) {
        $leaders = Leader::all();
        if (!$leaders->count()) {
            return back();
        }
        $item = User::findOrFail($id);
        return view('admin.users.edit', compact('item', 'leaders'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'leader_id' => 'required',
        ]);
        $leader = User::findOrFail($id);
        if ($request->has('password') and $request->post('password') != null and $request->post('password') != '') {
            $leader->update([
                'password' => bcrypt($request->post('password')),
            ]);
        }
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . rand(10000, 10000000) . $extension;
            $destinationPath = base_path(). '/public/users' ;
            $file->move($destinationPath, $fileName);
            $leader->update($request->except(['password', 'avatar']) + ['avatar' => $fileName]);
        } else {
            $leader->update($request->except(['password', 'avatar']));
        }
        session()->flash('success', 'User Created Successfully');
        return redirect(url('admin/users'));
    }

    public function delete($id) {
        $item = User::findOrFail($id);
        $item->delete();
        session()->flash('success', 'User Deleted Successfully');
        return redirect(url('admin/users'));
    }
}
