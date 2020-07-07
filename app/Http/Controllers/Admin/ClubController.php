<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Club;
use Brian2694\Toastr\Facades\Toastr;
use App\Designation;
use App\University;
use App\Details;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::orderBy('name', 'asc')->get();
        return view('admin.club.index',compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $club = $request->validate([
            'name'=>'required|unique:clubs'
        ]);

        $club = New Club;
        $club->name = $request->name;
        $club->save();

        Toastr::success('Club Saved Successfully','Success');

        return redirect()->route('club.index');
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
        $club = Club::findOrFail($id);
        return view('admin.club.edit',compact("club"));
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
        $club = $request->validate([
            'name'=>'required'
        ]);

        $club = Club::findOrFail($id);
        $club->name = $request->name;
        $club->save();

        Toastr::success('Club Updated Successfully','Success');

        return redirect()->route('club.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = Club::findOrFail($id);
        $club->delete();

        Toastr::error('Club Soft  Deleted Successfully','Success');

        return redirect()->route('club.index');
    }

    public function softdelete(){
        $clubs = Club::onlyTrashed()->get();
        $designations = Designation::onlyTrashed()->get();
        $universities = University::onlyTrashed()->get();
        $details = Details::onlyTrashed()->get();
        return view('admin.softdelete',compact('clubs','designations','universities','details'));
    }

    public function restore($id){
        $club = Club::withTrashed()->where('id' , $id)->first();
        $club->restore();

        Toastr::success('Club Restore Successfully','Success');

        return redirect()->route('club.index');
    }
}
