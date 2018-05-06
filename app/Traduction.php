<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traduction extends Model
{
    //
    public $table="traductions";

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
