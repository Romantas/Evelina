<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Practice;

class IndexController extends Controller
{
    public function __construct()
    {
        //$this->middleware();
    }
    public function index(){
        $practices = Practice::all();

        return view('welcome')->with('practices', $practices);
    }
}
