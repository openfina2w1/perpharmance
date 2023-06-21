<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Mailsend;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'subject' => 'Test mail subject',
            'body' => 'Test mail body'
        ];

        try{
            Mail::to("biswajeet.ghosh.143@gmail.com.com")->send(new Mailsend($data));
            return response()->json(['Please check your mail']);
        } catch(Exception $th){
            return response()->json(['mail not send']);
        }
    }
}
