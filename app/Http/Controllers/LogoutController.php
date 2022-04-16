<?php

namespace App\Http\Controllers;

use App\Models\UserAction;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request){


        $userAction = $request->session()->get("user")->first_name." ".$request->session()->get("user")->last_name." has logout.";
        UserAction::create(["user_id"=>$request->session()->get("user")->id,"action"=> $userAction]);

        $request->session()->remove("user");

        return redirect("/");
    }
}
