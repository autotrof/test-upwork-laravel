<?php

namespace App\Http\Controllers\investigator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Models\InvestigatorServiceLine;
use Auth;

class InvestigatorController extends Controller
{
  public function index(){
    return view('investigator.index');
  }

  public function viewProfile(){
    $states = State::all();
    return view('investigator.profile',['states'=>$states]);
  }

  public function store(Request $request){
     $user_id = Auth::user()->id;
    // echo "<pre>"; print_r($request->all()); die;
      $request->validate([
        'phone'   => 'required|digits:10',
        'address' => 'required',
        'city'    => 'required',
        'state'   => 'required',
        'zipcode' => 'required'
      ]);
     $user = User::find($user_id);
     $user->phone     = $request->phone;
     $user->address   = $request->address;
     $user->address_1 = $request->address_1;
     $user->city      = $request->city;
     $user->state_id  = $request->state;
     $user->country_id= 1;
     $user->zipcode   = $request->zipcode;
     $user->save();

     foreach ($request->investigation_type as $investigation_type) {
         $serviceLine = new InvestigatorServiceLine();
         if (!isset($investigation_type["type"]))
             continue;
         $serviceLine->investigation_type = $investigation_type["type"];
         $serviceLine->case_experience    = $investigation_type["case_experience"];
         $serviceLine->years_experience   = $investigation_type["years_experience"];
         $serviceLine->hourly_rate        = $investigation_type["hourly_rate"];
         $serviceLine->travel_rate        = $investigation_type["travel_rate"];
         $serviceLine->milage_rate        = $investigation_type["milage_rate"];
         $serviceLine->user_id            = $user_id;
         $serviceLine->save();
     }


     echo "done";

}

}
