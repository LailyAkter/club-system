<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Designation;
use App\Country;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::latest()->get();
        return view('admin.designation.index',compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::latest()->get();
        return view('admin.designation.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'designation'=>'required',
            'country_id'=>'required',
            'name'=>'required',
        ]);

        $designation = new Designation;
        $designation->designation = $request->designation;
        $designation->country_id =$request->country_id;
        $designation->name =$request->name;
        $designation->email =$request->email;
        $designation->phone_number =$request->phone_number;
        $designation->save();

        Toastr::success('Designation Saved Successfully','Success');

        return redirect()->route('designation.index');
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
        $designation = Designation::find($id);
        $countries = Country::latest()->get();
        return view('admin.designation.edit',compact("designation",'countries'));
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
        $data = $request->validate([
            'designation'=>'required',
            'country_id'=>'required',
            'name'=>'required',
        ]);

        $designation =Designation::find($id);
        $designation->designation = $request->designation;
        $designation->country_id =$request->country_id;
        $designation->name =$request->name;
        $designation->email =$request->email;
        $designation->phone_number =$request->phone_number;
        $designation->save();

        Toastr::success('Designation Updated Successfully','Success');

        return redirect()->route('designation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designation = Designation::find($id);
        $designation->delete();

        Toastr::error('Designation  soft Deleted Successfully','Success');

        return redirect()->route('designation.index');
    }

    public function soft(){
        $designations = Designation::onlyTrashed()->get();
        return view('admin.softdelete.designation',compact('designations'));
    }

    public function restore($id){
        $designation = Designation::withTrashed()->where('id' , $id)->first();
        $designation->restore();

        Toastr::success('Designation Restore Successfully','Success');

        return redirect()->route('designation.index');
    }
}
