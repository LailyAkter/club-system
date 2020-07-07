<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\Designation;
use DB;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','verified']);
    }
    
    public function index(Request $request){
        $countries = Country::orderBy('country','asc')->get();
        $designations = Designation::latest()->get();
        return view('admin.dashboard',compact('countries','designations'));
    }

    // Get 
    public function getEmbassy(Request $request){
        $country_id = $request->country_id;
        $embassy = Country::find($country_id)->embassy;
        $address = Country::find($country_id)->address;
        // dd($embassy);
        return response()->json([
            "embassy"=>$embassy,
            "address"=>$address
        ]);
    }


    public function country($id){
        // $country = Country::find($id);
        $designations = Designation::where('country_id',$id)->get();
        return view("admin.allDesignation",compact('designations'));
    }

    public function designation ($id){
        
        $designations = Designation::where('id',$id)->get();
        return view('admin.allPerson',compact('designations'));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $countries = DB::table("countries")->where('country','LIKE','%'.$request->search."".'%')->get();
        return view('admin.country.index',compact('countries'));

    }
}
