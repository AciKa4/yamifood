<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class BackController extends MyBaseController
{
    public function home(){

        $this->data["orders"] = Order::all();
        $this->data["users"] = User::all();
        $this->data["orders_sum"] = Order::sum("total_price");

        return view("admin.pages.home",$this->data);
    }
}
