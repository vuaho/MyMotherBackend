<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationTracker extends Model
{
    public function ride() {
        return $this->belongsTo('App\Ride');
    }
}
