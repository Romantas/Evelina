<?php

namespace App\Http\Controllers;

use App\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function __construct(){
        $this->middleware('auth:company');
    }

    public function index(){
        $practices = Practice::all();
        return view('practice.index', compact('practice'))->with('practices', $practices);
    }

    public function create(){
        return view('practice.create');
    }

    public function store(Request $request){
        //return dd($request->title);
        $this->validate($request, [
            'title' => 'required|string|max:225',
            'body'  => 'required|string|max:225',
        ]);
        Practice::create([
            'user_id' => $request->user()->id,
            'title'   => $request->title,
            'body'    => $request->body,
        ]);
        return redirect()->route('practice.index');
    }
    public function edit($id){
        $practice = Practice::find($id);
        return view('practice.edit')->with('practice', $practice);
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string|max:225',
            'body'  => 'required|string|max:225',
        ]);
        Practice::find($id)->update([
            'user_id' => $request->user()->id,
            'title'   => $request->title,
            'body'    => $request->body,
        ]);
        return redirect()->route('practice.index');
    }
    public function destroy($id){
        Practice::find($id)->delete();
        return redirect()->back();
    }
}
