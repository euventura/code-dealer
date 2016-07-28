<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

     protected $fillable = ['name', 'framework', 'description'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function servers()
    {
        return $this->hasMany(\App\Server::class);
    }
}
