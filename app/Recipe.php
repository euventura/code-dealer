<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use SoftDeletes;

    protected $fillable = ['path', 'repo', 'shared_folders', 'shared_files', 'writable_folders'];

    public function project()
    {
        return $this->belongsTo(\App\Project::class);
    }

    public function tasks()
    {
        return $this->hasMany(\App\RecipeTask::class);
    }
}
