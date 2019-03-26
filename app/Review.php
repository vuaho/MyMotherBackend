<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function ride() {
        return $this->belongsTo('App\Ride');
    }
}
