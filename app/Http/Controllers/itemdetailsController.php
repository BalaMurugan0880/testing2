<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\companyregister;
use App\User;
use App\item;

class itemdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;#Authenticate User's ID
        $user      = User::find($id);#Find user that login using authenticate user ID
        $company   = $user->companyregister;#find users company register row in companyregister table
        $companyId = $company->vendor_uniqid;#Get companyregister ID that Belongs to user that login

        $data = DB::table('item_tbl')
            ->select('item_tbl.id','item_tbl.itemcat_name','item_tbl.item_name','item_tbl.item_desc','item_tbl.item_price','item_tbl.item_image','item_tbl.item_deli','item_tbl.item_pickup','item_tbl.item_deliradius','item_tbl.item_deliprice',)
            ->where(['item_tbl.vendor_uniqid' => $companyId])
            ->get();

        $data1 = DB::table('additem_tbl')
        ->select('additem_tbl.id','additem_tbl.additem_name','additem_tbl.additem_price')
        ->where(['additem_tbl.vendor_uniqid' => $companyId])
        ->get();

        return view('vendor/itemdetails',compact('data','data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $item_id = $request->input('item_id');
        $item_name = $request->input('item_name');
        $item_desc = $request->input('item_desc');
        $item_price = $request->input('item_price');
        $item_image = $request->input('item_image');
        $item_deli = $request->input('item_deli');
        $item_pickup = $request->input('item_pickup');
        $item_deliradius = $request->input('item_deliradius');
        $item_deliprice = $request->input('item_deliprice');
        $additem_id = $request->input('additem_id');
        $additem_name = $request->input('additem_name');
        $additem_price = $request->input('additem_price');


        if($request->has('delete')){

              DB::table('item_tbl')->where('id',$item_id)->delete();
              DB::table('additem_table')->where('id',$additem_id)->delete();


         return redirect()->to('itemdetails')->with('message', trans('Succesfully Deleted'));
              

        }
        

        $data1 = DB::table('item_tbl')->where('id', $item_id)->update(['item_name' =>  $item_name,'item_desc' =>  $item_desc,'item_price' =>  $item_price,'item_deli' =>  $item_deli,'item_pickup' =>  $item_pickup,'item_deliradius' =>  $item_deliradius,'item_deliprice' =>  $item_deliprice]);

        $data2 = DB::table('additem_tbl')->where('id', $additem_id)->update(['additem_name' =>  $additem_name,'additem_price' =>  $additem_price]);

        

        return redirect()->to('itemdetails')->with('message', trans('Succesfully Updated'));


    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
