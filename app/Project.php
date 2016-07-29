<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'framework', 'description'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function servers()
    {
        return $this->hasMany(\App\Server::class);
    }

    public function recipe()
    {
        return $this->hasOne(\App\Recipe::class);
    }
}
