<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itemcat extends Model
{
   protected $table = 'itemcat_tbl';

    protected $fillable = ['vendor_uniqid','mainitemcat_name'];

    public function companyregister(){
    	 return $this->belongsTo('App\companyregister');
    }

     public function item()
    {
         return $this->hasMany('App\item', 'itemcat_id', 'id');
    }
}
