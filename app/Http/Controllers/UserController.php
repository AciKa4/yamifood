<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends MyBaseController
{
    public function index(){


        $this->data["users"] = User::with("roles")->get();

        return view("admin.pages.users",$this->data);
    }
}
