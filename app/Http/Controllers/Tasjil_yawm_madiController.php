<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ta7akoum;
use DateTime;
use DB;
use Auth;
class Tasjil_yawm_madiController extends Controller
{
    //
    public function tasjil_yawm_madi($id,Request $request)
    {



            $jour=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('id', $id)->first();
            $last_row=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->orderBy('id', 'desc')->first();
        $j = (new DateTime($jour->created_at));

        $l=$j->format('l');
        $y=$j->format('Y');
        $m=$j->format('m');
        $d=$j->format('d');
        $Tasjil_elyawm=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at', $j->format($y.'-'.$m.'-'.$d.' 00:00:00'))->get();
            if($request->isMethod('post')){
                foreach($Tasjil_elyawm as $myTasjil_elyawm) {
                    $edit=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('id', $myTasjil_elyawm->id);
                    if(null!=($request->input('note'.$myTasjil_elyawm->id))){
                            $note=$request->input('note'.$myTasjil_elyawm->id);
                           $edit->update(['note'=>$note]);
                        }
                        $radio=$request->input($myTasjil_elyawm->id);
                    $edit->update(['radio'=>$radio]);


                }

                return redirect('show_tasjil/'.$j->format('Y/m/d'));
            }



            $Tasjil_elyawm=array('Tasjil_elyawm'=>$Tasjil_elyawm);
            return view('tasjil_yawm_madi',$Tasjil_elyawm,['l'=>$l,'y'=>$y,'m'=>$m,'d'=>$d,'id'=>$id]);

    }
}
