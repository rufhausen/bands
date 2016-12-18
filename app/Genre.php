<?php

namespace App;

use App\Cache;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Well, the idea here is that genres are in the db, but they never change, so lets override the all() method and
     * always cache this data. Not sure if this the best approach.
     *
     * @param array $columns
     */
    public static function all($columns = ['*'])
    {
        $genres = \Cache::remember('genres', 60, function () {
            return parent::all();
        });

        return $genres;
    }

    /**
     * @return mixed
     */
    public function album()
    {
        return $this->hasMany('App\Album');
    }
}
