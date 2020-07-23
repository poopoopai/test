<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
class SendEmailController extends Controller
{
    function send(Request $request)
    {
        
        // $this->validate($request, [
            // 'title'  =>  'required',
            // 'name'     =>  'required',
            // 'email'  =>  'required|email',
            // 'message' =>  'required'
        // ]);

        // $data = array(
        //     'title'     =>  $request->title,
        //     'name'      =>  $request->name,
        //     'message'   =>   $request->message
        // );
        dd(42);
        $rules = [
            'title'  =>  'required',
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
        ];
        $messages = [
            'title.required' => '請輸入文章標題',
            'name.reqired' => '請輸入名稱', 
            'email.reqired' => '請輸入Email', 
            'message.reqired' => '請輸入訊息',
        ];

        $data = $request->validate($rules);

        
        dd($data);
        Mail::to($request->email)->send(new SendEmail($data));
        
        return back()->with('success', 'Thanks for contacting us!');

    }

    public function test()
    {
       $rules = [
           'title' => 'required',
           'cotent' => 'required',
       ];
       $messages = [
           'title.required' => '請輸入文章標題',
           'cotent.reqired' => '請輸入文章內容', 
       ];
      
       request()->validate($rules, $messages);
       
    }
}
