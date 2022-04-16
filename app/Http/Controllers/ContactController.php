<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends MyBaseController
{
    public function index(){
        return view("pages.contact",$this->data);
    }

    public function store(ContactRequest $request)
    {

        $name = $request->name;
        $email = $request->email;
        $text = $request->text;
        $subject = $request->subject;

        $to = "arsic.acika@gmail.com";
        $body = "<h2>Contact</h2>
                <h4>Name</h4><p>{$name}</p>
                <h4>Email</h4><p>{$email}</p>
                <h4>Message</h4><p>{$text}</p>";


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

        $headers .= "From: " . $name . "<" . $email . ">";

        if (mail($to, $subject, $body, $headers)) {
            return redirect()->route("contact")->with(["msg"=>"Message send successfuly"]);

        }

        else
        {
            return back()->with(["msg"=>"Message was not send."]);
        }

    }
}
