<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    public function rider() {
        return $this->belongsTo('App\Rider');
    }

    public function kid() {
        return $this->belongsTo('App\Kid');
    }
}
