<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'gender'=>'required'
        ]);

        User::where('id', auth()->user()->id)->update([
            'name'=>$request->name,
            'phone_number'=>$request->phone_number,
            'description'=>$request->description,
            'gender'=>$request->gender,
            'adress'=>$request->address
        ]);
        return redirect()->back()->with('message', 'profile updated');
    }
}
