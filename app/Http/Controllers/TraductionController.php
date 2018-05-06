<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traduction;
use Auth;
use DB;
class TraductionController extends Controller
{
    //
    public function traduction(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request,['mot'=>'required','traduction'=>'required'],['traduction.required'=>'من فضلك ،يجب أن تقوم بملئ حقل الكلمة  .','traduction.required'=>'من فضلك ،يجب أن تقوم بملئ حقل الترجمة  .']);



            $newsilfiya=new Traduction();
            $newsilfiya->mot=$request->input('mot');
            $newsilfiya->traduction=$request->input('traduction');
            $newsilfiya->id_user=Auth::user()->id;
            $newsilfiya->save();
            return redirect('traduction');
        }
        $traduction=DB::table('traductions')->where('id_user',(Auth::user()->id))->get();
        return view('traduction',['traduction'=>$traduction]);
    }


    public function update_traduction($id,Request $request){

        $trad=DB::table('traductions')->where('id_user',(Auth::user()->id))->where('id', $id)->first();
        $mot=$trad->mot;
        $traduction=$trad->traduction;
        if($request->isMethod('post')){

            $this->validate($request,['mot'=>'required','traduction'=>'required'],['traduction.required'=>'من فضلك ،يجب أن تقوم بملئ حقل الكلمة  .','traduction.required'=>'من فضلك ،يجب أن تقوم بملئ حقل الترجمة  .']);

            DB::table('traductions')->where('id_user',(Auth::user()->id))->where('id', $id)->update(['mot'=>$request->input('mot'),'traduction'=>$request->input('traduction')]);


            return redirect('traduction');
        }

        return view('update_traduction',['id'=>$id,'mot'=>$mot,'traduction'=>$traduction]);
    }
}
