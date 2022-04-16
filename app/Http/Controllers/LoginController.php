<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends MyBaseController
{
    public function login(){
            return view("pages.login",$this->data);
    }

    public function store(LoginRequest $request){

        try{

            $user = User::where("email",$request->email)
                ->where("password",md5($request->password))
                ->first();


            if($user)
            {
                $request->session()->put("user",$user);
                $userAction = $user->first_name." ".$user->last_name." has logged in.";
                UserAction::create(["user_id"=>$user->id,"action"=> $userAction]);

                return redirect("/");
            }
            else
            {
                return back()->with("loginError","Wrong password or email, please try again.");
            }
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }


}
