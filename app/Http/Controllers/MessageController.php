<?php

namespace App\Http\Controllers;

use App\Practice;
use Illuminate\Http\Request;
use App\Message;
use App\Student;
use App\Company;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        //$this->middleware();
    }
    public function index(){
            return view('messages');

    }

    public function getContacts(){
        $contacts = Company::all();
        return response()->json($contacts);
    }
    public function getMessageFor($email){
        $messages = Message::where('from', $email)->orWhere('to', $email)->get();
        return response()->json($messages);

    }
}
