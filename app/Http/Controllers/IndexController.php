<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function search(Request $request){
        $search = $request->get('search');
        $practices = DB::table('practices')->where('title', 'like', '%'. $search .'%')->paginate(5);
        return view('welcome')->with('practices', $practices);
    }
}
