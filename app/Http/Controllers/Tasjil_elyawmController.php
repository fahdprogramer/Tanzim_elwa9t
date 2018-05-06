<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ta7akoum;
use App\Tasjil_elyawm;
use DateTime;
use Auth;


class Tasjil_elyawmController extends Controller
{
    //
	public function Tasjil_elyawm(Request $request)
    {
       //$Tasjil_elyawm=Ta7akoum::all();
            $count= DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->count();
		if ($count==0){
                    $ta7akoum=DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->get();
		return view('ta7akoum',['ta7akoum'=>$ta7akoum]);
			//return view('first_day');
		}else{
       $Tasjil_elyawm=DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->get();
       $last_row=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->orderBy('id', 'desc')->first();
            if($request->isMethod('post')){
			  foreach($Tasjil_elyawm as $myTasjil_elyawm) {
			      $j=date('l');
                  if (!empty($myTasjil_elyawm->$j)) {
                      $newTasjil_elyawm = new Tasjil_elyawm();
                      $newTasjil_elyawm->name = $myTasjil_elyawm->name;
                      if(null!=($request->input('note'.$myTasjil_elyawm->id))){
                      $newTasjil_elyawm->note = $request->input('note'.$myTasjil_elyawm->id);
                      }
                      $newTasjil_elyawm->radio = $request->input($myTasjil_elyawm->id);
                      $newTasjil_elyawm->created_at = date('Y-m-d');
                      $newTasjil_elyawm->updated_at = date('Y-m-d');
                      $newTasjil_elyawm->id_user = Auth::user()->id;
                      $newTasjil_elyawm->save();
                  }
              }
			
            return redirect('show_tasjil/'.date('Y/m/d'));}
		 }
                 if(!empty($last_row)&&(date('Y/m/d')==(new DateTime($last_row->created_at))->format('Y/m/d'))){
                   return redirect('show_tasjil/'.date('Y/m/d'));  
                 }else{
		$Tasjil_elyawm=array('Tasjil_elyawm'=>$Tasjil_elyawm);
		return view('Tasjil_elyawm',$Tasjil_elyawm);
                 }
    }
}
