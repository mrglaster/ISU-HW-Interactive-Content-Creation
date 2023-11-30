<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'user_id', 'project_id', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeCompleted($query)
    {
        return $query->where('completed', true);
    }

    // Query Scope для активных задач
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    // Query Scope для задач конкретного проекта
    public function scopeInProject($query, $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    // Query Scope для задач, назначенных конкретному пользователю
    public function scopeAssignedToUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    
}
