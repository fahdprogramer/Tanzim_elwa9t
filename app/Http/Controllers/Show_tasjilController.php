<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ta7akoum;
use DateTime;
use DB;
use Auth;
class Show_tasjilController extends Controller
{
    //
    public function show_tasjil($y,$m,$d)
    {
        $datetime_test = new DateTime($y.'-'.$m.'-'.$d);
        $datetime_test->modify('+1 day');
			$day=$datetime_test->format('d');
			$month=$datetime_test->format('m');
			$yers=$datetime_test->format('Y');
        
        $show_tasjil = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where([
    ['created_at','>=', $y.'-'.$m.'-'.$d.' 00:00:00']
])->where([
    ['created_at','<', $yers.'-'.$month.'-'.$day.' 00:00:00']
])->get();
        return view('show_tasjil',['show_tasjil'=>$show_tasjil]);
    }
}
