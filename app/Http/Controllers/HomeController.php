<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tasjil_elyawm;
use DateTime;
use Auth;
use App\Ta7akoum;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {





        
        
        
$count= DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->count();
$count2= DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->count();
		if ($count==0){
                    $ta7akoum=DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->get();
                    return view('ta7akoum',['ta7akoum'=>$ta7akoum]);
			//return view('first_day');
                }elseif ($count2==0) {
		      $Tasjil_elyawm=DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->get();
		$Tasjil_elyawm=array('Tasjil_elyawm'=>$Tasjil_elyawm);
		return view('Tasjil_elyawm',$Tasjil_elyawm);
		}else{

            //------------------------------------------------------------------------------------------------------------
            $last_row=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->orderBy('id', 'desc')->first();
            $Tasjil_elyawm_edit=DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->get();
            $yesterday_day=date('d', strtotime( '-1 days' ));
            $yesterday_month=date('m', strtotime( '-1 days' ));
            $yesterday_yers=date('Y', strtotime( '-1 days' ));
            $day=( new DateTime($last_row->created_at))->format('d');;
            $month=( new DateTime($last_row->created_at))->format('m');;
            $yers=( new DateTime($last_row->created_at))->format('Y');;

            $datetime_yesterday = new DateTime($yesterday_yers.'-'.$yesterday_month.'-'.$yesterday_day);
            $datetime_test = new DateTime($yers.'-'.$month.'-'.$day);

            $datetime_today = new DateTime(date('Y').'-'.date('m').'-'.date('d'));

            if ($datetime_today!=$datetime_test){
                if($datetime_test->format('Y')<$datetime_yesterday->format('Y')) {
                    while ($datetime_yesterday!=$datetime_test){

                        $datetime = new DateTime($yers.'-'.$month.'-'.$day);
                        $datetime->modify('+1 day');
                        $day=$datetime->format('d');
                        $month=$datetime->format('m');
                        $yers=$datetime->format('Y');
                        $datetime_test = new DateTime($yers.'-'.$month.'-'.$day);

                        foreach($Tasjil_elyawm_edit as $myTasjil_elyawm_edit) {
                            $j=$datetime_test->format('l');
                            if (!empty($myTasjil_elyawm_edit->$j)) {
                                $newTasjil_elyawm = new Tasjil_elyawm();
                                $newTasjil_elyawm->name = $myTasjil_elyawm_edit->name;
                                $newTasjil_elyawm->radio = '';
                                $newTasjil_elyawm->created_at = $datetime_test->format('Y-m-d');
                                $newTasjil_elyawm->id_user = Auth::user()->id;
                                $newTasjil_elyawm->save();

                            }}

                    }
                }elseif($datetime_test->format('Y')==$datetime_yesterday->format('Y')){
                    if($datetime_test->format('m')<$datetime_yesterday->format('m')) {
                        while ($datetime_yesterday!=$datetime_test){

                            $datetime = new DateTime($yers.'-'.$month.'-'.$day);
                            $datetime->modify('+1 day');
                            $day=$datetime->format('d');
                            $month=$datetime->format('m');
                            $yers=$datetime->format('Y');
                            $datetime_test = new DateTime($yers.'-'.$month.'-'.$day);

                            foreach($Tasjil_elyawm_edit as $myTasjil_elyawm_edit) {
                                $j=$datetime_test->format('l');
                                if (!empty($myTasjil_elyawm_edit->$j)) {
                                    $newTasjil_elyawm = new Tasjil_elyawm();
                                    $newTasjil_elyawm->name = $myTasjil_elyawm_edit->name;
                                    $newTasjil_elyawm->radio = '';
                                    $newTasjil_elyawm->created_at = $datetime_test->format('Y-m-d');
                                    $newTasjil_elyawm->id_user = Auth::user()->id;
                                    $newTasjil_elyawm->save();

                                }}

                        }
                    }elseif ($datetime_test->format('m')==$datetime_yesterday->format('m')){
                        if($datetime_test->format('d')<$datetime_yesterday->format('d')){
                            while ($datetime_yesterday!=$datetime_test){

                                $datetime = new DateTime($yers.'-'.$month.'-'.$day);
                                $datetime->modify('+1 day');
                                $day=$datetime->format('d');
                                $month=$datetime->format('m');
                                $yers=$datetime->format('Y');
                                $datetime_test = new DateTime($yers.'-'.$month.'-'.$day);

                                foreach($Tasjil_elyawm_edit as $myTasjil_elyawm_edit) {
                                    $j=$datetime_test->format('l');
                                    if (!empty($myTasjil_elyawm_edit->$j)) {
                                        $newTasjil_elyawm = new Tasjil_elyawm();
                                        $newTasjil_elyawm->name = $myTasjil_elyawm_edit->name;
                                        $newTasjil_elyawm->radio = '';
                                        $newTasjil_elyawm->created_at = $datetime_test->format('Y-m-d');
                                        $newTasjil_elyawm->id_user = Auth::user()->id;
                                        $newTasjil_elyawm->save();

                                    }}

                            }
            }}}}

            //------------------------------------------------------------------------------------------------------------

		$first_row=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->first();
		$last_row=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->orderBy('id', 'desc')->first();
                $date= new DateTime($last_row->created_at);
		$last_month=$date->format('m');
		$last_année=$date->format('Y');
                $datetime_test = new DateTime($last_année.'-'.$last_month.'-01');
                $datetime_test->modify('+1 Months');
                $datetime_test=$datetime_test->format('Y-m-d');
                $date_first_row= new DateTime($first_row->created_at);
		$last_month_first_row=$date_first_row->format('m');
		$last_année_first_row=$date_first_row->format('Y');
                
		$tasjil_elyawm = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where([
    ['created_at', '>=', $last_année.'-'.$last_month.'-1 00:00:00']
])->where([
    ['created_at', '<', $datetime_test.' 00:00:00']
])->groupBy('created_at')->get();
		 $arr_c=Array('tasjil_elyawm'=>$tasjil_elyawm);
	$test_last=1;
	if(($last_month_first_row==$date->format('m'))&&($last_année_first_row==$date->format('Y'))) { $test_last=0; };
			
         return view('home',$arr_c,['test_next'=>'0','test_last'=>$test_last]);
    }
    }
    }
	
	
	
