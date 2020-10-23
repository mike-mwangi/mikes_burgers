<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Burger extends Model
{
    protected $table = 'burgers';
    protected $fillable = [
        'burger_name,
        burger_description,
        burger_price,
        burger_image'
    ];
}
