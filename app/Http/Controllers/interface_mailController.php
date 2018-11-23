<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class interface_mailController extends Controller
{
    public function send(Request $request)
{
   
    $this->validate($request,[
        "uname" => "required",
        "umail" => "required",
        "sub" => "required",
        "msg" => "required",
        
    ]);
    

   Mail::raw( $request->msg,function($message) use($request){
       $message->to('lakhdar.chikhi5@gmail.com','lakhdar')->subject($request->sub);
       $message->from($request->umail,$request->uname);
   });
   
   return redirect('template.contact')->with('success','Message Envoyer avec success');
}
}
