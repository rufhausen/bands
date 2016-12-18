<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $guarded = [];

    public static function boot()
    {
        static::deleting(function ($model) {
            $model->albums()->delete();
        });
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('m/d/Y');
    }

    public function albums()
    {
        return $this->hasMany('App\Album');
    }
}
