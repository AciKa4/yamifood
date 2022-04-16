<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterController extends MyBaseController
{
    public function index(){
            return view("pages.register",$this->data);
    }

    public function store(RegisterUserRequest $request){

        $role_id = 2;

        DB::beginTransaction();

        try{
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'role_id' => $role_id,
                'email' => $request->email,
                'password' => md5($request->password)
            ]);

            DB::commit();

            $userAction = $request->first_name." ".$request->last_name." has registered.";
            UserAction::create(["user_id"=>$user->id,"action"=> $userAction]);

            return back()->with('successReg','You have successfully registered!');

        }
        catch(\Exception $e){

            DB::rollBack();
            Log::error($e->getMessage());
        }

    }
}
