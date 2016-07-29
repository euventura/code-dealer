<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecipeTask extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'task', 'order'];

    public function recipe()
    {
        return $this->belongsTo(\App\Project::class);
    }
}
