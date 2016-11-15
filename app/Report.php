<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['name','create_date','user_id' ];

    function Test()
   {
   		return $this->hasMany('App\Test');
   }
}
