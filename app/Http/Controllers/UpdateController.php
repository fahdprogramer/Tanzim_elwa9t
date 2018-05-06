<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tasjil_elyawm;
use App\Ta7akoum;
use Auth;
class UpdateController extends Controller
{
    //
    public function update($id,Request $request){

        $name=DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('id', $id)->first();
        $name=$name->name;

        if($request->isMethod('post')){

            $this->validate($request,['name'=>'required'],['name.required'=>'من فضلك ،يجب أن تقوم بملئ حقل الواجب اليومي .']);

            DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['name'=>$request->input('name')]);
            
            DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['name'=>$request->input('name')]);
            DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['sunday'=>null,'Monday'=>null,'Monday'=>null,'Wednesday'=>null,'Tuesday'=>null,'Friday'=>null,'Thursday'=>null,'Saturday'=>null]);


            if(!empty($request->input('toujour')) || (empty($request->input('toujour'))&&empty($request->input('sunday'))&&empty($request->input('Monday'))&&empty($request->input('Tuesday'))&&empty($request->input('Wednesday'))&&empty($request->input('Thursday'))&&empty($request->input('Friday'))&&empty($request->input('Saturday'))) ){
                DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['sunday'=>'true','Monday'=>'true','Monday'=>'true','Wednesday'=>'true','Tuesday'=>'true','Friday'=>'true','Thursday'=>'true','Saturday'=>'true']);
            }else{
                if(!empty($request->input('sunday'))){DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['sunday'=>'true']);}
                if(!empty($request->input('Monday'))){DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['Monday'=>'true']);}
                if(!empty($request->input('Tuesday'))){DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['Tuesday'=>'true']);}
                if(!empty($request->input('Wednesday'))){DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['Wednesday'=>'true']);}
                if(!empty($request->input('Thursday'))){DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['Thursday'=>'true']);}
                if(!empty($request->input('Friday'))){DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['Friday'=>'true']);}
                if(!empty($request->input('Saturday'))){DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->where('name', $name)->update(['Saturday'=>'true']);}
            }


            return redirect('ta7akoum');
        }

        return view('update',['id'=>$id,'name'=>$name]);
    }


}
