<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
   	protected $primaryKey = 'id';
    public $timestamps  = false;

   public function apartment()
   {
	return $this->belongsTo('App\Apartment');
   }
   

}