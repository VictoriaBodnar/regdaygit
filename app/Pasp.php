<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Pasp extends Model
{
    //$pasps = App\Pasp::orderBy('date_zamer', 'desc')->get();

    /*$pasps = App\Pasp::where('user_id', 1)
               ->orderBy('date_zamer', 'desc')
               ->take(10)
               ->get();*/

               /**
     * "Загружающий" метод модели.
     *
     * @return void
     */
   
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('date_zamer', function (Builder $builder) {
            $builder->orderBy('date_zamer', 'desc');
        });
    }
}
