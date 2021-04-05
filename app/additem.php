<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\companyregister;
use Auth;

class additem extends Model
{
  protected $table = 'additem_tbl';

    protected $fillable = ['additemcat_id','vendor_uniqid','additem_name','additem_price'];

    public function additemcat(){
    	 return $this->belongsTo('App\additemcat', 'id' , 'additemcat_id');
    }

    public static function companyID()
    {
        if (Auth::check()) {
        	$id = Auth::user()->id;#Authenticate User's ID
            $user      = User::find($id);#Find user that login using authenticate user ID
            $company   = $user->companyregister;#find users company register row in companyregister table
            $companyId = $company->vendor_uniqid;#Get companyregister ID that Belongs to user that login 
        }

        return $companyId;
    }
}
