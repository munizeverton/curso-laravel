<?php

namespace CursoLaravel\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'owner_id',
        'client_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date',
    ];

    public function client()
    {
        return $this->belongsTo(\CursoLaravel\Entities\Client::class);
    }

    public function user()
    {
        return $this->belongsTo(\CursoLaravel\Entities\User::class, 'owner_id');
    }

    public function notes()
    {
        return $this->hasMany(\CursoLaravel\Entities\ProjectNote::class);
    }

    public function tasks()
    {
        return $this->hasMany(\CursoLaravel\Entities\ProjectTask::class);
    }

    public function members()
    {
        return $this->belongsToMany(\CursoLaravel\Entities\User::class, 'project_members');
    }

}