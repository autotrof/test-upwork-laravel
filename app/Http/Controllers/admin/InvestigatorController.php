<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\admin\InvestigatorRequest;

class InvestigatorController extends Controller
{
    public function index()  //listing for all investigator roles user
    {
        $investigators = User::where('role', 3)->get();
        return view('admin.investigator.index', ['investigators'=>$investigators]);
    }

    public function create() //return view for add new investigator
    {
        return view('admin.investigator.form');
    }

    public function store(InvestigatorRequest $request) //for storing data new and old investigator
    {
        if(!empty($request->id)) {
            $investigator = User::findOrFail($request->id); //if user already exists and coming update request
        } else {
            $investigator = new User(); //if user is new
        }
        $investigator->first_name = $request->first_name;
        $investigator->last_name  = $request->last_name;
        $investigator->email      = $request->email;
        $investigator->role       = $request->role;
        $investigator->password   = Hash::make('12345678');
        $investigator->save();
        return redirect()->route('admin.investigator.index');
    }

    public function edit(User $investigator) //find exist investigator user and return data in form
    {
        return view('admin.investigator.form', compact('investigator'));
    }

    public function destroy(User $investigator) //delete investigator user from table
    {
        $investigator->delete();
        return redirect()->route('admin.investigator.index');
    }

}
