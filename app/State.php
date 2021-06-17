<?php

namespace App;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['state_name'];
    public function creator()
    {
        return $this->hasMany(Creator::class);
    }
}
