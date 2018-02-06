<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    
  protected $fillable = [
        'name', 'persons', 'date', 'time', 'phone'
    ];
}
