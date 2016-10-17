<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function subcategory()
    {
    	return $this->belongsTo('App\Subcategory');
    }
    
}
