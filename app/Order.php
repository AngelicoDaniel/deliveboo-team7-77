<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_surname',
        'customer_address',
        'customer_phone',
        'customer_email',
        'ship_cost',
        'dishe_id'
    ];




    public function dishes() {
        return $this->belongsToMany('App\Dish');
    }
}
