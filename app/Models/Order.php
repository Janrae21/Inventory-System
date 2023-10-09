<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        // Other fillable fields
        'item_name',
        'customer_name',
        'quantity_sold',
        'order_number',
        'payment_method',
        'shipment_status',
        // ...
    ];
    use HasFactory;

}
