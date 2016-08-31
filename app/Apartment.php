<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  protected $primaryKey = 'id';
  public $timestamps  = false;
  

  public function owner()
  {
  	return $this->hasOne('App\Owner');
  }
  
  public function tenant()
  {
  	return $this->hasMany('App\Tenant');
  }

  

}
