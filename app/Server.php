<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{

     protected $fillable = ['name', 'stage', 'user', 'host', 'password', 'pem'];

    public function project()
    {
        return $this->belongsTo(\App\Project::class);
    }
}
