<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [];

    public function album()
    {
        return $this->hasMany('App\Album');
    }
}
