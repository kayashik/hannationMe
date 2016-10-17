<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NightPlace extends Model
{
    public function events()
  {
    return $this->morphMany('App\Event', 'place');
  }
  
}
