<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ta7akoum;
use DateTime;
use Auth;
use DB;

class Ta7akoumController extends Controller
{
    //
	public function ta7akoum(Request $request)
    {
		if($request->isMethod('post')){
			 $this->validate($request,['name'=>'required'],['name.required'=>'من فضلك ،يجب أن تقوم بملئ حقل الواجب اليومي .']);
			 
			 
			 
			$newsilfiya=new Ta7akoum();
			$newsilfiya->name=$request->input('name');
  if(!empty($request->input('toujour')) || (empty($request->input('toujour'))&&empty($request->input('Sunday'))&&empty($request->input('Monday'))&&empty($request->input('Tuesday'))&&empty($request->input('Wednesday'))&&empty($request->input('Thursday'))&&empty($request->input('Friday'))&&empty($request->input('Saturday'))) ){
                $newsilfiya->Sunday='true';
                $newsilfiya->Monday='true';
                $newsilfiya->Tuesday='true';
                $newsilfiya->Wednesday='true';
                $newsilfiya->Thursday='true';
                $newsilfiya->Friday='true';
                $newsilfiya->Saturday='true';

            }else{
      if(!empty($request->input('Sunday'))){$newsilfiya->Sunday='true';}
      if(!empty($request->input('Monday'))){$newsilfiya->Monday='true';}
      if(!empty($request->input('Tuesday'))){$newsilfiya->Tuesday='true';}
      if(!empty($request->input('Wednesday'))){$newsilfiya->Wednesday='true';}
      if(!empty($request->input('Thursday'))){$newsilfiya->Thursday='true';}
      if(!empty($request->input('Friday'))){$newsilfiya->Friday='true';}
      if(!empty($request->input('Saturday'))){$newsilfiya->Saturday='true';}
  }
			$newsilfiya->id_user=Auth::user()->id;         
            $newsilfiya->save();
		 return redirect('ta7akoum');
		 }
		$ta7akoum=DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->get();
		return view('ta7akoum',['ta7akoum'=>$ta7akoum]);
    }
    
    
    public function delete_wajib($id){
	DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('id', $id)->delete();
               return redirect('/ta7akoum');
	}
	
}
