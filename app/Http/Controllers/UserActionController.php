<?php

namespace App\Http\Controllers;

use App\Models\UserAction;
use Illuminate\Http\Request;

class UserActionController extends MyBaseController
{

        public function index(){

            $this->data["actions"] = UserAction::with('user')->get();


            return view("admin.pages.useractions",$this->data);
        }

        public function filter(Request $request){
            $date = date("Y-m-d",strtotime($request->date));

            $actions = UserAction::with("user");

            if($request->selectAll == 'false') {
                $actions = $actions->whereDate("created_at", $date);
            }


            $actions = $actions->get();
            return response()->json($actions);


        }
}
