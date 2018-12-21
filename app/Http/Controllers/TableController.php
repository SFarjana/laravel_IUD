<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;

class TableController extends Controller
{
	public function home(){
		$obj = Info::all();
		return view('pages.dashboard')->with(compact('obj'));
	}
    public function user(){
        $obj = Info::all();
        return view('pages.list')->with(compact('obj'));
    }
    public function insert(Request $req){

        $req->validate([
            'name' => 'required|unique:infos,name',
            'address' => 'required',
        ]);

    	$name = $req->name;
    	$address = $req->address;

    	$obj = new Info();

    	$obj->name = $name;
    	$obj->address = $address;

    	if($obj->save()){
    		return redirect('/w')->with('success','Insert is successful');
    	}else{
    		return redirect('/w')->with('error','Something went wrong');
    	}
    }

    public function edit($id){

    	$updata = Info::find($id); //select * from find where id = $id
    	return view('pages.update')->with(compact('updata'));
    }

    public function update(Request $req,$id){

        $req->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

    	$obj = Info::find($id);

    	$obj->name = $req->name;
    	$obj->address = $req->address;

    	if($obj->update()){
    		return redirect('/w')->with('success','Update is successful');
    	}else{
    		return view('pages.update')->with('error','Something went wrong');
    	}
    }

    public function delete($id){
    	$delete = Info::find($id);

    	if($delete->delete()){
    		return redirect('/w')->with('success','Successful Deleted');
    	}else{
    		return redirect('/w')->with('error','Something went wrong');
    	}

    }
}
