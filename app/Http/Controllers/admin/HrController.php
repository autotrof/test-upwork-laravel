<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\admin\HrRequest;

class HrController extends Controller
{
    public function index()   //listing for all hr roles user
    {
        $hrs = User::where('role', 2)->get();
        return view('admin.hr.index', compact('hrs'));
    }

    public function create() //return view for add new hr
    {
        return view('admin.hr.form');
    }

    public function store(HrRequest $request) //for storing data new and old hr
    {
        if (!empty($request->id)) {
            $hr = User::findOrFail($request->id);
        } else {
            $hr = new User();
        }
        $hr->first_name = $request->first_name;
        $hr->last_name  = $request->last_name;
        $hr->email      = $request->email;
        $hr->role       = 2;
        $hr->password   = Hash::make('12345678');
        $hr->save();
        return redirect()->route('admin.hr.index');
    }

    public function edit(User $hr)  //find exist hr user and return data in form
    {
        return view('admin.hr.form', compact('hr'));
    }

    public function destroy(User $hr)  //delete hr user from table
    {
        $hr->delete();
        return redirect()->route('admin.hr.index');
    }


}
