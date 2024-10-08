<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderItems (){
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
    public function buyer (){
        return $this->belongsTo(Buyer::class, 'buyer_id', 'id');
    }
}
