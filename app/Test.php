<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  protected $fillable = ['name', 'result', 'create_date','report_id', 'user_id' ];
}
