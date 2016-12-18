<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];
    protected $dates   = [
        'created_at',
        'updated_at',
    ];

    public function getCoverImagePathAttribute()
    {
        return "/img/covers/{$this->id}.jpg";
    }

    public function getRecordDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('m/d/Y');
    }

    public function getReleaseDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('m/d/Y');
    }

    public function band()
    {
        return $this->belongsTo('App\Band');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
}
