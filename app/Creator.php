<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{

    protected $fillable = ['name', 'subtitle', 'description', 'visible' ];

    public function state() {
        return $this->belongsToMany(State::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function links()
    {
        return $this->hasMany(LinkCreator::class);
    }
}
