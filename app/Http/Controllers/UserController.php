<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;



class UserController extends Controller
{
    //
    public function create(){ 
        return view('auth.register');
    }

    function dashboard(){

        return view('dashboard')->with('article_name','dashboard');
    }
    public function store()
    {
        
      
       $attributes= request()->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'

        ]); 
        
        $attributes['password']= bcrypt($attributes['password']);
        User::create($attributes); 
        session()->flash('success', 'Your Registration Completed Successfully');
        return redirect("/register")->with('Successfully Registered');
    }

 function edit_password(){
      
       return view('auth.edit')->with('article_name','change_password');
    }

    function update($id){

        $data= User::find($id);
        session()->flash('success', 'Successfully updated');
        return redirect("/edit_password")->with('Successfully Updated')->with('article_name','change_password');
    }
}
