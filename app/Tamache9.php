<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamache9 extends Model
{
    //
    public $table="tamache9s";

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
