<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
   protected $table = 'item_tbl';

    protected $fillable = ['vendor_uniqid','itemcat_id','itemcat_name','item_name','item_desc','item_price','item_image','item_deli','item_pickup','item_deliradius','item_deliprice'];

    public function itemcat(){
    	 return $this->belongsTo('App\itemcat', 'id', 'itemcat_id');
    }

     public function additemcat()
    {
         return $this->hasMany('App\additemcat', 'item_id', 'id');
    }
}
