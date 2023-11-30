<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($project) {
            $project->tasks()->delete();
        });
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Query Scope для активных проектов
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    // Query Scope для проектов с конкретным именем
    public function scopeWithName($query, $name)
    {
        return $query->where('name', $name);
    }
}
