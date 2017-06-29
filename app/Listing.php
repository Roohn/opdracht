<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    public function tickets() {
        return $this->hasMany('App\Ticket','listingId');
    }
}
