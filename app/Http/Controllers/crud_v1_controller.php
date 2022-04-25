<?php

namespace App\Http\Controllers;

use App\Models\CrudV1;
use Illuminate\Http\Request;

class crud_v1_controller extends Controller
{
    // create index
    public function index() {
        $data['crud'] = CrudV1::orderBy('id', 'asc')->paginate(3);
        return view('crud.index' ,$data);
    }

    // create resource
    public function create() {
        return view('crud.create');
    }

    // store resource
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $check = new CrudV1();
        $check->name = $request->name;
        $check->email = $request->email;
        $check->phone = $request->phone;
        $check->save();
        return redirect()->route('crud.index')->with('success' ,'Create user successfully.');
    }

    // edit resource
    public function edit($id) {
        $check = CrudV1::find($id);
        return view('crud.edit', compact('check'));
    }

    // update resource
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $check = CrudV1::find($id);
        $check->name = $request->name;
        $check->email = $request->email;
        $check->phone = $request->phone;
        $check->save();
        return redirect()->route('crud.index')->with('success' ,'Update user successfully.');
    }

    // destroy resource
    public function destroy($id) {
        $check = CrudV1::find($id);
        $check->delete();
        return redirect()->route('crud.index')->with('success' ,'Delete user successfully.');
    }
}
