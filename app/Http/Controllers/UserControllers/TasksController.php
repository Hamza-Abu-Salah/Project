<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\TeamLeader;
use App\Models\Project;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function to_do(Request $request) {
        if ($request->has('project_id')) {
            $items = Task::whereDoesntHave('user_task', function ($query) {
                $query->where('user_id', auth()->id());
            })->where('project_id', $request->get('project_id'))->orderBy('id', 'desc')->get();
        } else {
            $items = Task::whereDoesntHave('user_task', function ($query) {
                $query->where('user_id', auth()->id());
            })->orderBy('id', 'desc')->get();
        }
        return view('user.tasks.to_do', compact('items'));
    }

    public function doing() {
        $items = UserTask::with('task.project')->where('user_id', auth()->id())->where('status', '1')->get();
        foreach ($items as $item) {
            $time = time() - intval(($item->start_time?? 0));
            $minutes = gmdate('i', $time);
            $item->time = $minutes;
        }
        return view('user.tasks.doing', compact('items'));
    }

    public function done() {
        $items = UserTask::with('task.project')->where('user_id', auth()->id())->where('status', '2')->get();
        foreach ($items as $item) {
            $time = intval(($item->end_time?? 0)) - intval(($item->start_time?? 0));
            $minutes = gmdate('i', $time);
            $item->time = $minutes;
        }
        return view('user.tasks.done', compact('items'));
    }

    public function cancelled() {
        $items = UserTask::with('task.project')->where('user_id', auth()->id())->where('status', '3')->get();
        foreach ($items as $item) {
            $time = intval(($item->end_time?? 0)) - intval(($item->start_time?? 0));
            $minutes = gmdate('i', $time);
            $item->time = $minutes;
        }
        return view('user.tasks.cancelled', compact('items'));
    }

    public function start($id) {
        session()->flash('success', 'Task Created Successfully');
        Task::findOrFail($id);
        $user_task = UserTask::create([
            'user_id' => auth()->id(),
            'task_id' => $id,
            'status' => '1',
            'start_time' => time(),
        ]);
        return back();
    }

    public function complete($id, $user_task_id) {
        Task::findOrFail($id);
        $user_task = UserTask::findOrFail($user_task_id);
        $user_task->update([
            'status' => '2',
            'end_time' => time(),
        ]);
        return back();
    }

    public function cancel($id, $user_task_id) {
        Task::findOrFail($id);
        $user_task = UserTask::findOrFail($user_task_id);
        $user_task->update([
            'status' => '3',
            'end_time' => time(),
        ]);
        return back();
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
