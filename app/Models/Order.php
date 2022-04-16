<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable=["name","city","address","user_id","phone","total_price"];


    public function order_infos(){
        return $this->hasMany(OrderInfo::class);
    }
}
