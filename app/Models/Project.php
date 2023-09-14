<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function leader() {
        return $this->belongsTo(Leader::class, 'leader_id');
    }

    public function tasks() {
        return $this->hasMany(Task::class, 'project_id');
    }
}
