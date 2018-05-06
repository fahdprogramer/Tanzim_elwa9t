<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ta7akoum extends Model
{
    //
	public $table="ta7akoums";
      
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
