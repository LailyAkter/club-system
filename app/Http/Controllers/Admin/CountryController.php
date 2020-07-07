<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use Brian2694\Toastr\Facades\Toastr;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('country','asc')->get();
        return view("admin.country.index",compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.country.create");
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
            'country'=>'required',
            'embassy'=>'required',
            'address' => 'required'
        ]);

        $country = new Country;
        $country->country = $request->country;
        $country->embassy =$request->embassy;
        $country->address =$request->address;
        $country->save();

        Toastr::success('Country Saved Successfully','Success');

        return redirect()->route('designation.create');
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
        $country = Country::find($id);
        return view('admin.country.edit',compact('country'));
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
            'country'=>'required',
            'embassy'=>'required',
            'address' => 'required'
        ]);

        $country = Country::find($id);
        $country->country = $request->country;
        $country->embassy =$request->embassy;
        $country->address =$request->address;
        $country->save();

        Toastr::success('Country Updated Successfully','Success');

        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();

        Toastr::error('Country Soft Deleted Successfully','Success');

        return redirect()->route('country.index');
    }

    public function soft(){
        $countries = Country::onlyTrashed()->get();
        return view('admin.softdelete.country',compact('countries'));
    }

    public function restore($id){
        $country = Country::withTrashed()->where('id' , $id)->first();
        $country->restore();

        Toastr::success('Country Restore Successfully','Success');

        return redirect()->route('country.index');
    }
}
