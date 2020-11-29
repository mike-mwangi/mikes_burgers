<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];


    public function items()
    {
        return $this->belongsToMany(Burger::class, 'order_items','order_id','burger_id');

    }
}
