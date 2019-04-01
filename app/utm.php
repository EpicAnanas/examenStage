<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class utm extends Model
{
  public function klant(){
    return $this->belongsTo('App\klant');
  }
}
