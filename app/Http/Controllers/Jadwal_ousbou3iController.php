<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tasjil_elyawm;
use App\Ta7akoum;
use DateTime;
use Auth;
class Jadwal_ousbou3iController extends Controller
{
    //
    public function jadwal_ousbou3i()
    {
        $count = DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->count();
        $count2 = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->count();
        if ($count == 0) {
            $ta7akoum = DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->get();
            return view('ta7akoum', ['ta7akoum' => $ta7akoum]);
            //return view('first_day');
        } elseif ($count2 == 0) {
            $Tasjil_elyawm = DB::table('ta7akoums')->where('id_user',(Auth::user()->id))->get();
            $Tasjil_elyawm = array('Tasjil_elyawm' => $Tasjil_elyawm);
            return view('Tasjil_elyawm', $Tasjil_elyawm);
        } else {
            $last_row = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->orderBy('id', 'desc')->first();
            $jour = (new DateTime($last_row->created_at));

            $jour_moin_1 = (new DateTime($jour->format('Y') . '-' . $jour->format('m') . '-' . $jour->format('d') . ' 00:00:00'));
            $jour_moin_1->modify('-1 day')->format('Y-m-d 00:00:00');

            $jour_moin_2 = (new DateTime($jour->format('Y') . '-' . $jour->format('m') . '-' . $jour->format('d') . ' 00:00:00'));
            $jour_moin_2->modify('-2 day')->format('Y-m-d 00:00:00');

            $jour_moin_3 = (new DateTime($jour->format('Y') . '-' . $jour->format('m') . '-' . $jour->format('d') . ' 00:00:00'));
            $jour_moin_3->modify('-3 day')->format('Y-m-d 00:00:00');

            $jour_moin_4 = (new DateTime($jour->format('Y') . '-' . $jour->format('m') . '-' . $jour->format('d') . ' 00:00:00'));
            $jour_moin_4->modify('-4 day')->format('Y-m-d 00:00:00');

            $jour_moin_5 = (new DateTime($jour->format('Y') . '-' . $jour->format('m') . '-' . $jour->format('d') . ' 00:00:00'));
            $jour_moin_5->modify('-5 day')->format('Y-m-d 00:00:00');

            $jour_moin_6 = (new DateTime($jour->format('Y') . '-' . $jour->format('m') . '-' . $jour->format('d') . ' 00:00:00'));
            $jour_moin_6->modify('-6 day')->format('Y-m-d 00:00:00');

            $jour_moin_7 = (new DateTime($jour->format('Y') . '-' . $jour->format('m') . '-' . $jour->format('d') . ' 00:00:00'));
            $jour_moin_7->modify('-7 day')->format('Y-m-d 00:00:00');

            if ($jour->format('l') == 'Saturday') {
                $jadwal_ousbou3i = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3, $jour_moin_4, $jour_moin_5, $jour_moin_6])->get();
                $jadwal_ousbou3i_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3, $jour_moin_4, $jour_moin_5, $jour_moin_6])->where('name', '<>', '0')->groupBy('name')->orderBy('id', 'desc')->get();
                $nbr_jour_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3, $jour_moin_4, $jour_moin_5, $jour_moin_6])->get();
                $nbr_jour_groupe = $nbr_jour_groupe->groupBy('created_at')->count();
                $count = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at', $jour_moin_7)->count();
                $nbr_jour = 7;
            } elseif ($jour->format('l') == 'Friday') {
                $jadwal_ousbou3i = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3, $jour_moin_4, $jour_moin_5])->get();
                $jadwal_ousbou3i_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3, $jour_moin_4, $jour_moin_5])->where('name', '<>', '0')->groupBy('name')->orderBy('id', 'desc')->get();
                $nbr_jour_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3, $jour_moin_4, $jour_moin_5])->get();
                $nbr_jour_groupe = $nbr_jour_groupe->groupBy('created_at')->count();
                $count = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at', '=', $jour_moin_6)->count();
                $nbr_jour = 6;
            } elseif ($jour->format('l') == 'Thursday') {
                $jadwal_ousbou3i = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3, $jour_moin_4])->get();
                $jadwal_ousbou3i_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3, $jour_moin_4])->where('name', '<>', '0')->groupBy('name')->orderBy('id', 'desc')->get();
                $nbr_jour_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3, $jour_moin_4])->get();
                $nbr_jour_groupe = $nbr_jour_groupe->groupBy('created_at')->count();
                $count = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at', $jour_moin_5)->count();
                $nbr_jour = 5;
            } elseif ($jour->format('l') == 'Wednesday') {
                $jadwal_ousbou3i = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3])->get();
                $jadwal_ousbou3i_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3])->where('name', '<>', '0')->groupBy('name')->orderBy('id', 'desc')->get();
                $nbr_jour_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2, $jour_moin_3])->get();
                $nbr_jour_groupe = $nbr_jour_groupe->groupBy('created_at')->count();
                $count = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at', $jour_moin_4)->count();
                $nbr_jour = 4;
            } elseif ($jour->format('l') == 'Tuesday') {
                $jadwal_ousbou3i = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2])->get();
                $jadwal_ousbou3i_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2])->where('name', '<>', '0')->groupBy('name')->orderBy('id', 'desc')->get();
                $nbr_jour_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1, $jour_moin_2])->get();
                $nbr_jour_groupe = $nbr_jour_groupe->groupBy('created_at')->count();
                $count = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at', $jour_moin_3)->count();
                $nbr_jour = 3;
            } elseif ($jour->format('l') == 'Monday') {
                $jadwal_ousbou3i = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1])->get();
                $jadwal_ousbou3i_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1])->where('name', '<>', '0')->groupBy('name')->orderBy('id', 'desc')->get();
                $nbr_jour_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->whereIn('created_at', [$jour, $jour_moin_1])->get();
                $nbr_jour_groupe = $nbr_jour_groupe->groupBy('created_at')->count();
                $count = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at', $jour_moin_2)->count();
                $nbr_jour = 2;
            } else {
                $jadwal_ousbou3i = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at', $jour)->get();
                $jadwal_ousbou3i_groupe = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at', $jour)->where('name', '<>', '0')->groupBy('name')->orderBy('id', 'desc')->get();
                $count = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->where('created_at', $jour_moin_1)->count();
                $nbr_jour_groupe = '1';
                $nbr_jour = 1;
            }
            $arr_c = Array('jadwal_ousbou3i' => $jadwal_ousbou3i);
            if ($count == 0) {
                $test_last = '0';
            } else {
                $test_last = '1';
            }
            return view('jadwal_ousbou3i', $arr_c, ['test_next' => '0', 'test_last' => $test_last, 'nbr_jour' => $nbr_jour, 'jadwal_ousbou3i_groupe' => $jadwal_ousbou3i_groupe, 'nbr_jour_groupe' => $nbr_jour_groupe]);
        }
    }
    
}
