<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [    
    	'tax_amount', 'total_amount', 'user_id'
    ];
      public function carts()
    {
        return $this->belongsTo('App\Carts');
    }

}
