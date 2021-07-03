<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkCreator extends Model
{
    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }
}
