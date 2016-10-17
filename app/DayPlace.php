<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayPlace extends Model
{
    public function events()
  {
    return $this->morphMany('App\Event', 'place');
  }
}
