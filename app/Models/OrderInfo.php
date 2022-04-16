<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;

    protected $fillable=['product_id','name', 'price', 'quantity', 'order_id'];

    public function orders(){
        return $this->belongsTo(Order::class);
    }
}
