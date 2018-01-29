<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    

      public function dishes()
    {
        return $this->belongsTo('App\Dishes', 'dish_id');
    }

}
