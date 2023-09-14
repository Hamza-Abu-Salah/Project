<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $items = Task::whereDoesntHave('user_task', function ($query) {
            $query->where('user_id', auth()->id());
        })->orderBy('id', 'desc')->get();
        return view('user.index', compact('items'));
    }

    public function logout() {
        auth()->logout();
        return redirect(url('user/login'));
    }
}
