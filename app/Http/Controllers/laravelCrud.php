<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class laravelCrud extends Controller
{
    function indexix(){
        return view('crud.indexix');
    }
    function add(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:crud'
        ]);
        $query = DB::table('crud')->insert([
            'name'=>$request->input('name'),
            'email'=>$request->input('email')
        ]);
        if($query){
            return back()->with('success','Data have been successfuly inserted');
        }else {
            return back()->with('fail','something went wrong');
        }
    }
}
