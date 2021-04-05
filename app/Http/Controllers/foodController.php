<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\companyregister;
use App\itemcat;
use App\item;
use App\user;
use App\additemcat;
use App\additem;

class foodController extends Controller
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


       
            $itemcat = DB::table('itemcat_tbl')

            ->select('itemcat_tbl.itemcat_name','itemcat_tbl.id')
             ->where(['itemcat_tbl.vendor_uniqid' => $companyId])
            ->get();

    
            $items = item::all()->where('vendor_uniqid', $companyId)->groupBy('itemcat_name');

            $itemlist = DB::table('item_tbl')

            ->select('item_tbl.item_name','item_tbl.id')
             ->where(['item_tbl.vendor_uniqid' => $companyId])
            ->get();

            $additionalItemCategory = DB::table('additemcat_tbl')

            ->select('additemcat_tbl.additemcat_name','additemcat_tbl.id')
             ->where(['additemcat_tbl.vendor_uniqid' => $companyId])
            ->get();


            return view('vendor/addfood',compact('itemcat','itemlist','additionalItemCategory','items'));
       
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
        $validated = $request->validate([
        'itemcat_name' => 'required|max:255|unique:itemcat_tbl',
        ]);

        $itemCatagory = new itemcat();

        $itemCatagory->itemcat_name = $request->input('itemcat_name');


        $id = Auth::user()->id;#Authenticate User's ID
        $user      = User::find($id);#Find user that login using authenticate user ID
        $company   = $user->companyregister;#find users company register row in companyregister table
        $companyId = $company->vendor_uniqid;#Get companyregister ID that Belongs to user that login 

        $itemCatagory->vendor_uniqid = $companyId;


        $itemCatagory->save();
        
        return redirect()->to('addfood')->with('message', trans('Succesfully Added Category'));
    }

    public function storeitem(Request $request){

        $validated = $request->validate([
        'itemcat_name' => 'required|max:255',
        'item_name' => 'required|unique:item_tbl|max:255',
        'item_desc' => 'required|max:255',
        'item_price' => 'required|max:255',
        'file' => 'required',
        'itemcat_id' => 'required',


        ]);

            $items = new item();
            $items->itemcat_id = $request->input('itemcat_id');
            $items->itemcat_name = $request->input('itemcat_name');
            $items->item_name = $request->input('item_name');
            $items->item_desc = $request->input('item_desc');
            $items->item_price = $request->input('item_price');
            $items->item_pickup = $request->input('item_pickup');
            $items->item_deli = $request->input('item_deli');
            $items->item_deliradius = $request->input('item_deliradius');
            $items->item_deliprice = $request->input('item_deliprice');

            $id = Auth::user()->id;#Authenticate User's ID
            $user      = User::find($id);#Find user that login using authenticate user ID
            $company   = $user->companyregister;#find users company register row in companyregister table
            $companyId = $company->vendor_uniqid;#Get companyregister ID that Belongs to user that login 

            $items->vendor_uniqid = $companyId;

            if ($request->has('file')) {
            
            foreach ($request->file as $file) {

                $filename = $file->getClientOriginalName();

                $file->storeAs('public/upload',$filename);

                $items->item_image = $filename;
            
            }

        }


        $items->save();
        
        return redirect()->to('addfood')->with('message', 'Succesfully Added Item');
        }

        public function storeadditemcat(Request $request){
             $request->validate([
            'moreFields.*.item_id' => 'required',
            'moreFields.*.vendor_uniqid' => 'required',
            'moreFields.*.additemcat_name' => 'required|unique:additemcat_tbl',
        ]);
     
        foreach ($request->moreFields as $key => $value) {
            additemcat::create($value);
        }
     
        return back()->with('success', 'Additional Item Category Has Been Added Successfully.');
        }


        public function storeadditem(Request $request){
             $request->validate([
            'moreFields.*.additemcat_id' => 'required',
            'moreFields.*.vendor_uniqid' => 'required',
            'moreFields.*.additem_name' => 'required|unique:additem_tbl',
        ]);
     
        foreach ($request->moreFields as $key => $value) {
            additem::create($value);
        }
     
        return back()->with('success', 'Additional Item Has Been Added Successfully.');
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
        //
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
