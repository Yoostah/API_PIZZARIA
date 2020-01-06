<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = 'pedidos';

    protected $fillable = [
        'pizza_id', 'customer_name', 'customer_phone', 'customer_address',
    ];
}



