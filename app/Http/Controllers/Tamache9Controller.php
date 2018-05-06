<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tamache9;
use Auth;
use DB;
class Tamache9Controller extends Controller
{
    //
    public function tamache9(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request,['mot'=>'required','tamache9'=>'required'],['tamache9.required'=>'من فضلك ،يجب أن تقوم بملئ حقل الكلمة  .','tamache9.required'=>'من فضلك ،يجب أن تقوم بملئ حقل الترجمة  .']);



            $newsilfiya=new Tamache9();
            $newsilfiya->mot=$request->input('mot');
            $newsilfiya->tamache9=$request->input('tamache9');
            $newsilfiya->id_user=Auth::user()->id;
            $newsilfiya->save();
            return redirect('tamache9');
        }
        $tamache9=DB::table('tamache9s')->where('id_user',(Auth::user()->id))->get();
        return view('tamache9',['tamache9'=>$tamache9]);
    }
}
