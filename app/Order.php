<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'restaurant_id',
        'customer_name',
        'customer_surname',
        'phone_number',
        'customer_address',
        'total_price'
    ];
}
