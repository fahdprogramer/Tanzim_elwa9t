<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasjil_elyawm extends Model
{
    //
    public $table="tasjil_elyawms";
      protected function getDateFormat()
{
    return 'Y/m/d';
}
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
