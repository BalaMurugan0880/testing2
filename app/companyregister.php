<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class companyregister extends Model
{
     protected $table = 'vendor_tbl';

    protected $fillable = ['vendor_cmpyname','vendor_pic','vendor_addr','vendor_city','vendor_postcode','vendor_state','vendor_contact','vendor_ssm','vendor_logo','vendor_id','vendor_logo_url','vendor_url',"vendor_uniqid"];

    public function User(){
    	 return $this->belongsTo('App\User','id' , 'vendor_id');
    }

     public function itemcat()
    {
         return $this->hasMany('App\itemcat' ,'vendor_uniqid', 'vendor_uniqid');
    }

}
