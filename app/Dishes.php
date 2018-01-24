<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    protected $fillable = [
        'dish_id', 'dish_name', 'dish_price', 'dish_picture', 'dish_description'
    ];
    protected $table = 'dishes';
}
