<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'tax_amount', 'total_amount', 'user_id', 'order_status'
    ];

      public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    // public function dishes(){
    // 	 return $this->hasManyThrough(
    //         'App\Dishes',
    //         'App\Cart',
    //         'order_id',
    //         'id',
    //         'dish_id'
    //     );
    // }

}
