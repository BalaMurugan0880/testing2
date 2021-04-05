<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\companyregister;
use Auth;
use DB;

class companydetailsController extends Controller
{
    public function index()

    { 	 $vendorID = Auth::user()->id;
         $companyDetails = DB::table('vendor_tbl')

         ->select('vendor_id','vendor_uniqid','vendor_cmpyname','vendor_pic','vendor_addr','vendor_city','vendor_postcode','vendor_state','vendor_contact','vendor_ssm' ,'vendor_logo','vendor_url')
             ->where(['vendor_id' => $vendorID])
            ->first();


            return view('vendor/companydetails',compact('companyDetails'));
    }



    public function update(Request $request)

	{	    
		$vendorID = Auth::user()->id;
		$vendor_pic = $request->input('vendor_pic');
		$vendor_cmpyname = $request->input('vendor_cmpyname');
		$vendor_contact = $request->input('vendor_contact');
		$vendor_url = $request->input('vendor_url');

		  if ($request->has('file')) {
            
            foreach ($request->file as $file) {

                $filename = $file->getClientOriginalName();

                $file->storeAs('public/upload',$filename);

                $imgpath = 'storage/upload/'.$filename;

               	$data1 = DB::table('vendor_tbl')->where('vendor_id', $vendorID)->update(['vendor_logo' =>  $filename]);
                $data2 = DB::table('vendor_tbl')->where('vendor_id', $vendorID)->update(['vendor_logo_url' =>  $imgpath]);

            
            }

        }

         $test = DB::table('vendor_tbl')->where('vendor_id', $vendorID)->update(['vendor_cmpyname' =>  $vendor_cmpyname, 'vendor_pic' => $vendor_pic , 'vendor_contact' => $vendor_contact, 'vendor_url' => $vendor_url ]);

         return redirect('companydetails')->with('message', trans('Succesfully Update' ));

	}
}
