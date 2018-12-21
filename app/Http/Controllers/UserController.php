<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class UserController extends Controller
{
	public function logout(){
		Session::flush();
		return redirect('login');
	}
	public function login(){
		if(!Session::has('userid')){
            return view('pages.signin');
        }else{
        	if(Session::has('role')){
        		return redirect('/w');
        	}else{
        		return redirect('user');
        	}
        }
	}
	public function register(){
        if(!Session::has('userid')){
            return view('pages.signup');
        }else{
        	if(Session::has('role')){
        		return redirect('/w');
        	}else{
        		return redirect('user');
        	}
        }
	}

    public function registerstore(Request $req){
    	$password = $req->password;
    	$confirmpassword = $req->confirmpassword;

    	if($password == $confirmpassword){

    		$email = $req->email;

    		$obj = new User();

    		$obj->email = $email;
    		$obj->password = $password;
    		$obj->role = "1";

    		if($obj->save()){
    			return redirect('/login')->with('success','Successfully Registerd. Login Now.');
    		}
    		else{
    			return redirect('/register')->with('error','Somethhing went wrong. Try again');
    		}
    	}
    }

    public function loginstore(Request $request){
      $email    = $request->email;
      $password = $request->password;
      $user = User::where('email','=',$email)
                     ->where('password','=',$password)
                     ->first();
      if($user){
	      if($user->role=='0'){
	        Session::put('userid',$user->id);
	        Session::put('role',$user->role);
	        return redirect('/w')->with('success','Successfully Logged In');
	      }
	      else {
	        Session::put('userid',$user->id);
	        return redirect('user')->with('success','Successfully Logged In');
	      }
      }else{
      	return redirect('/login')->with('error','Invalid Input. Try again');
      }
      
   }
}
