<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function admin_login() {
        return view('auth.admin_login');
    }

    public function leader_login() {
        return view('auth.leader_login');
    }
    public function teamleader_login() {
        return view('auth.TeamLeader_login');
    }

    public function login_post(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $request->post('email'), 'password' => $request->post('password')])) {
            return redirect(url('user'));
        }
        session()->flash('error');
        return back();
    }

    public function admin_login_post(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth('admin')->attempt(['email' => $request->post('email'), 'password' => $request->post('password')])) {
            return redirect(url('admin'));
        }
        session()->flash('error');
        return back();
    }

    public function leader_login_post(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth('leader')->attempt(['email' => $request->post('email'), 'password' => $request->post('password')])) {
            return redirect(url('leader'));
        }
        session()->flash('error');
        return back();
    }
    public function teamleader_login_post(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth('teamleader')->attempt(['email' => $request->post('email'), 'password' => $request->post('password')])) {
            return redirect(url('teamleader'));
        }
        session()->flash('error');
        return back();
    }





}
