<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    public function barcodes() {
        return $this->hasMany('App\Barcode', 'ticketId');
    }
}
