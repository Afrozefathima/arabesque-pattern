<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';
    protected $primaryKey = 'shipping_id';
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'address',
        'city',
        'country',
        'postal_code',
        'status',
        'tracking_number'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}