<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kart extends Model
{
    //

     protected $table = 'kart';



    public function product()
    {
        return $this->belongsTo('App\Products');
    }

}
