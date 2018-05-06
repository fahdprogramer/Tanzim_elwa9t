<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tasjil_elyawm;
use Auth;
class NoteController extends Controller
{
    //
    public function note($id)
    {
        $note = DB::table('tasjil_elyawms')->where('id_user',(Auth::user()->id))->find($id);
        return view('note',['note'=>$note]);
    }
}
