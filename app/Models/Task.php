<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user_task() {
        return $this->hasMany(UserTask::class, 'task_id');
    }

    public function project() {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
