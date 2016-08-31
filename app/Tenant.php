<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $primaryKey = 'id';
    public $timestamps  = false;
    
   public function apartment()
   {
	return $this->belongsTo('App\Apartment');
   }

   public function report()
   {
   		return $this->hasMany('App\Report');

   }

    public function addTotal($lease)
   {
      $expense = $this->apartment->expense;
      return $total = $expense+ $this->lease;
   }
    public function getExpense()
   {
      $expense = $this->apartment->expense;
      return $expense;
   }

   public function getUnits(){
    $units=$this->apartment->noOfUnits;
    return $units;
   }

   // public function getNoOfUnits()
   // {
   //   for ($i=1; $i<=$tenant->getUnits(); $i++) 
   //   {
   //      echo '
   //      <option value="' . $i . '">' . $i . '</option>';
   //   }
   //   return $i;
   // }
}
