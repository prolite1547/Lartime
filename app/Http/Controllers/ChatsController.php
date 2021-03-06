<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Message;
use Auth;


class ChatsController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('chat');
    }

    public function sendMessage(Request $request){
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);
        

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }


    public function fetchMessages(){
        return Message::with('user')->get();
    }
}
