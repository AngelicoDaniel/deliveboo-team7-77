<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    protected $fillable = [
        'order_number',
        'customer_mame',
        'customer_surname',
        'customer_address',
        'customer_phone',
        'customer_email',
        'ship_cost'
    ];




    public function dishes() {
        return $this->belongsToMany('App\Dish');
    }
}
