<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SentEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class EmailController extends Controller
{
    //
    public function email(){
        // echo "hello ";
        $data = ['name'=>'xyz','data'=>'asdfghjk ghjk k sumit'];
        $user['to']='sumitkumarbag.test@gmail.com';
        Mail::send('mail',$data,function($msg) use ($user){
            $msg->to($user['to']);
            $msg->subject('Mail For Testing Purpose');
        });
    }

    public function index(){
        $data = User::all();

        return view ('mail',compact('data'));
    }

    public function EmailView($id){
        $data = User::find($id);
        return view('send_email_view',compact('data'));
    }

    public function StoreSingleEmail(Request $request,$id){
        $user = User::find($id);
        $details = array();
        $details['greeting']= $request->greeting;
        $details['body']= $request->body;
        $details['actiontext']= $request->actiontext;
        $details['actionurl']= $request->actionurl;
        $details['endtext']= $request->endtext;

        Notification::send($user, new SentEmailNotification($details));
        return redirect()->to('/user');
    }
}
