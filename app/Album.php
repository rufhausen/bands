<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];
    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getCoverImagePathAttribute()
    {
        return "/img/covers/{$this->id}.jpg";
    }

    /**
     * @param $value
     */
    public function getRecordDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('m/d/Y');
    }

    /**
     * @param $value
     */
    public function getReleaseDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('m/d/Y');
    }

    /**
     * @return mixed
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }

    /**
     * @return mixed
     */
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
}
