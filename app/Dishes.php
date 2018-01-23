<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    protected $fillable = [
        'dish_name', 'dish_picture', 'dish_picture', 'dish_price'
    ];
}
