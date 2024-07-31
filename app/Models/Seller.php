<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    public function shops()
    {
        return $this->hasMany(SellerShop::class, 'seller_id', 'id');
    }
}
