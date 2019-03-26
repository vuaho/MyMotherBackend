<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    public function rides() {
        return $this->hasMany('App\Ride');
    }
}
