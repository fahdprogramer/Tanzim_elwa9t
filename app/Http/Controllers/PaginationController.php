<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Auth;
use DateTime;
use App\Tasjil_elyawm;
class PaginationController extends Controller
{
    //
    public function last_week($last_day,$last_month,$last_année)
    {
        $last_row=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->orderBy('id', 'desc')->first();
        $jour=(new DateTime($last_année.'-'.$last_month.'-'.$last_day));

        $jour_moin_1 = (new DateTime($jour->format('Y').'-'.$jour->format('m').'-'.$jour->format('d').' 00:00:00'));
        $jour_moin_1->modify('-1 day')->format('Y-m-d 00:00:00');

        $jour_moin_2 = (new DateTime($jour->format('Y').'-'.$jour->format('m').'-'.$jour->format('d').' 00:00:00'));
        $jour_moin_2->modify('-2 day')->format('Y-m-d 00:00:00');

        $jour_moin_3 = (new DateTime($jour->format('Y').'-'.$jour->format('m').'-'.$jour->format('d').' 00:00:00'));
        $jour_moin_3->modify('-3 day')->format('Y-m-d 00:00:00');

        $jour_moin_4 = (new DateTime($jour->format('Y').'-'.$jour->format('m').'-'.$jour->format('d').' 00:00:00'));
        $jour_moin_4->modify('-4 day')->format('Y-m-d 00:00:00');

        $jour_moin_5 = (new DateTime($jour->format('Y').'-'.$jour->format('m').'-'.$jour->format('d').' 00:00:00'));
        $jour_moin_5->modify('-5 day')->format('Y-m-d 00:00:00');

        $jour_moin_6 = (new DateTime($jour->format('Y').'-'.$jour->format('m').'-'.$jour->format('d').' 00:00:00'));
        $jour_moin_6->modify('-6 day')->format('Y-m-d 00:00:00');

        $jour_moin_7 = (new DateTime($jour->format('Y').'-'.$jour->format('m').'-'.$jour->format('d').' 00:00:00'));
        $jour_moin_7->modify('-7 day')->format('Y-m-d 00:00:00');


        $jadwal_ousbou3i= DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour,$jour_moin_1,$jour_moin_2,$jour_moin_3,$jour_moin_4,$jour_moin_5,$jour_moin_6])->get();
        $jadwal_ousbou3i_groupe= DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour,$jour_moin_1,$jour_moin_2,$jour_moin_3,$jour_moin_4,$jour_moin_5,$jour_moin_6])->where('name', '<>', '0')->groupBy('name')->orderBy('id', 'desc')->get();
        $nbr_jour_groupe= DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour,$jour_moin_1,$jour_moin_2,$jour_moin_3,$jour_moin_4,$jour_moin_5,$jour_moin_6])->get();
        $nbr_jour_groupe=$nbr_jour_groupe->groupBy('created_at')->count();
        $count = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at',$jour_moin_7)->count();
        $nbr_jour=7;

        $arr_c=Array('jadwal_ousbou3i'=>$jadwal_ousbou3i);
        if ($count==0){$test_last='0';}else{$test_last='1';}
        return view('jadwal_ousbou3i',$arr_c,['test_next'=>'1','test_last'=>$test_last,'nbr_jour'=>$nbr_jour,'jadwal_ousbou3i_groupe'=>$jadwal_ousbou3i_groupe,'nbr_jour_groupe'=>$nbr_jour_groupe]);


    }
    public function next_week($next_day,$next_month,$next_année)
    {
        $last_row=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->orderBy('id', 'desc')->first();
        $jour=(new DateTime($next_année.'-'.$next_month.'-'.$next_day));


        $next_sunday = (new DateTime($jour->format('Y').'-'.$jour->format('m').'-'.$jour->format('d').' 00:00:00'));
        $next_sunday->modify('+7 day')->format('Y-m-d 00:00:00');

        $saturday = (new DateTime($jour->format('Y').'-'.$jour->format('m').'-'.$jour->format('d').' 00:00:00'));
        $saturday->modify('+6 day')->format('Y-m-d 00:00:00');

        $count = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at',$next_sunday)->count();
        if (!$count==0){
            return redirect('last_week/'.$saturday->format('d').'/'.$saturday->format('m').'/'.$saturday->format('Y'));
        }else{
            return redirect('/jadwal_ousbou3i');
        }



    }



    public function last_month($last_month,$last_année)
    {
		
		$lst_m=$last_month;
		$lst_a=$last_année;
		
		if ($lst_m='02'){
			$date = new DateTime($last_année.'-'.$last_month.'-28');
		}else{
		$date = new DateTime($last_année.'-'.$last_month.'-30');	
		}

		$date->modify('-1 Months');
		
		$last_month=$date->format('m');
		$last_année=$date->format('Y');
		$tasjil_elyawm = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where([
    ['created_at', '>=', $last_année.'-'.$last_month.'-1 00:00:00']
])->where([
   ['created_at', '<', $lst_a.'-'.$lst_m.'-1 00:00:00']
])->groupBy('created_at')->get();
		
		
		$last_row=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->first();
                $date_row= new DateTime($last_row->created_at);
		$last_row_yers=$date_row->format('Y');
		$last_row_month=$date_row->format('m');
		
		$test_last=1;
	if(($last_row_month==$last_month)&&($last_row_yers==$last_année)) { $test_last=0; };
		$test_next=1;
                
		
		
		
		
		 $arr_c=Array('tasjil_elyawm'=>$tasjil_elyawm);
		
		
		 return view('home',$arr_c,['test_next'=>$test_next,'test_last'=>$test_last]);
		 //return view('pr_page',['lst'=>$last_année]);
    }
	
	

	public function next_month($next_month,$next_année)
    {
            
		
		
        $date = new DateTime($next_année.'-'.$next_month.'-1');
		$date->modify('+1 Months');
		$next_month=$date->format('m');
		$next_année=$date->format('Y');
                
                $date_time = new DateTime($next_année.'-'.$next_month.'-1');
		$date->modify('+1 Months');
		$lst_m=$date->format('m');
		$lst_a=$date->format('Y');
                
		$tasjil_elyawm = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where([
    ['created_at', '>=', $next_année.'-'.$next_month.'-1 00:00:00']
])->where([
   ['created_at', '<', $lst_a.'-'.$lst_m.'-1 00:00:00']
])->groupBy('created_at')->get();
		 $arr_c=Array('tasjil_elyawm'=>$tasjil_elyawm);	
		
                 
                 $next_row=DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->orderBy('id', 'desc')->first();
                 $date_row= new DateTime($next_row->created_at);
		$next_row_yers=$date_row->format('Y');
		$next_row_month=$date_row->format('m');
                
                
		
		$test_next=1;
	if(($next_row_month==$next_month)&&($next_row_yers==$next_année)) { $test_next=0; };
		$test_last=1;
	
		
         return view('home',$arr_c,['test_last'=>$test_last,'test_next'=>$test_next]);
    }
}
