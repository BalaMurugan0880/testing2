<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\companyregister;
use Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class companyregisterController extends Controller
{
    public function index(){


    	return view('vendor/companyreg');
    }

    public function store(Request $request){

    	$companyReg = new companyregister();

        $companyReg->vendor_id = Auth::user()->id;
        $companyReg->vendor_pic = $request->input('vendor_pic');
        $companyReg->vendor_cmpyname = $request->input('vendor_cmpyname');
        $companyReg->vendor_addr = $request->input('vendor_addr');
        $companyReg->vendor_city = $request->input('vendor_city');
        $companyReg->vendor_postcode = $request->input('vendor_postcode');
        $companyReg->vendor_state = $request->input('vendor_state');
        $companyReg->vendor_contact = $request->input('vendor_contact');
        $companyReg->vendor_ssm = $request->input('vendor_ssm');
       
        $companyReg->vendor_url = $request->input('vendor_url');

        if ($request->has('file')) {
            
            foreach ($request->file as $file) {

                $filename = $file->getClientOriginalName();

                $file->storeAs('public/upload',$filename);

                $imgpath = 'storage/upload/'.$filename;

                $companyReg->vendor_logo = $filename;
                 $companyReg->vendor_logo_url = $imgpath;
            
            }

        }

        $config = ['table'=>'vendor_tbl','field'=>'vendor_uniqid','length'=>10,'prefix'=>'VDR-'];
        $vndrID = IdGenerator::generate($config);
        $companyReg->vendor_uniqid = $vndrID;


        $companyReg->save();
        
        return redirect()->to('vendormain');

    }
}
