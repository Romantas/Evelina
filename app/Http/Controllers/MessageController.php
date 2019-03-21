<?php

namespace App\Http\Controllers;

use App\Practice;
use Illuminate\Http\Request;
use App\Message;
use App\Student;
use App\Company;
use App\Events\NewMessage;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:student,company');
    }
    public function index(){
            return view('messages');

    }

    public function getContacts(){
        if(isset(auth('student')->user()->email) != null){
            $contacts = Company::all();
            return response()->json($contacts);
        }
        else{
            $contacts = Student::all();
            return response()->json($contacts);
        }
    }
    public function getMessageFor($email){
        $messages = Message::where('from', $email)->orWhere('to', $email)->get();
        return response()->json($messages);
    }
    public function send(Request $request){
        if(isset(auth('student')->user()->email) != null){
            $message = Message::create([
                'from' => auth('student')->user()->email,
                'to' => $request->contact_email,
                'text' => $request->text,
            ]);
        }
        else{
            $message = Message::create([
                'from' => auth('company')->user()->email,
                'to' => $request->contact_email,
                'text' => $request->text,
            ]);
        }

        broadcast(new NewMessage($message));

        return response()->json($message);
    }
}
