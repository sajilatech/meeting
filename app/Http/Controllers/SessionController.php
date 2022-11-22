<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class SessionController extends Controller
{
    use AuthenticatesUsers;
    
    public function __construct()

    {

      

    }
    public function destroy()
    {
       
        $id=auth()->user()->id;
        $array= [
            'active_login'=>'0'  
        

        ]; 
        User::where('id', $id)->update($array);   
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
 
    public function store(Request $request){


        $input = $request->all();



        $this->validate($request, [

            'email' => 'required|email',

            'password' => 'required',

        ]);
        
       // $attributes['password']= bcrypt($attributes['password']);
       if($id=auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))

       {
        
        session()->regenerate();
        $request->session()->put('type','1');
        $row= request()->validate([
            'active_login'=>'1',
                      

        ]); 
        $this->user_row = User::find($id); 
        if($this->user_row->type=='0') {
            session()->regenerate();
            $request->session()->put('type','0');
            $array= [
                'active_login'=>'1'  
            
    
            ]; 
            User::where('id', $id)->update($array);}   
        
            return redirect('/dashboard')->with('success','Welcome')->with('article_name','dashboard')->with('path');
        }
        elseif($this->user_row->type=='1'){
            return redirect('/dashboard')->with('success','Welcome')->with('article_name','dashboard');
        }
        // Authentical fails
        else{
          
            return back()->withInput()->withErrors(['email'=>'Your Credentials could not be verified'])->with('article_name','dashboard');

        }

      
    }
}
