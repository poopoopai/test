<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
class SendEmailController extends Controller
{
    function send(Request $request)
    {
        $this->validate($request, [
            'title'  =>  'required',
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
        ]);

        $data = array(
            'title'     =>  $request->title,
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );

        Mail::to($request->email)->send(new SendEmail($data));
        
        return back()->with('success', 'Thanks for contacting us!');

    }
}
