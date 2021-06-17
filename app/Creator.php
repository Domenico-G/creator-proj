<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{

    protected $fillable = ['name', 'subtitle', 'description', 'visible' ];

    public function state() {
        return $this->belongsTo(State::class);
    }
}
