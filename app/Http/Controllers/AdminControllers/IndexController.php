<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $tasks = UserTask::with('user', 'task')->orderBy('id', 'desc')->take(18)->get();
        foreach ($tasks as $item) {
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
        return view('admin.index', compact('tasks'));
    }

    public function logout() {
        auth('admin')->logout();
        return redirect(url('admin/login'));
    }
}
