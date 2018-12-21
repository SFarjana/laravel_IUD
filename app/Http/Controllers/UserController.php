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
            return view('pages.signin');
		
	}
	public function register(){
            return view('pages.signup');
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
