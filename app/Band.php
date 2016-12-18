<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    public static function boot()
    {
        //Delete all albums associated with band on band delete.
        static::deleting(function ($model) {
            $model->albums()->delete();
        });
    }

    /**
     * @param $value
     */
    public function getStartDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('m/d/Y');
    }

    /**
     * @return mixed
     */
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
}
