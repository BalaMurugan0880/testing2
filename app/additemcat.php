<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class additemcat extends Model
{
    protected $table = 'additemcat_tbl';

    protected $fillable = ['vendor_uniqid','item_id','additemcat_name'];

    public function item(){
    	 return $this->belongsTo('App\item', 'id', 'item_id');
    }

     public function additem()
    {
         return $this->hasMany('App\additem', 'additemcat_id', 'id' );
    }
}
