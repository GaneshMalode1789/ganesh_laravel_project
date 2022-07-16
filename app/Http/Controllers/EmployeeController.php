<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $data = Employee::paginate(10);
        return view('list')->with('data', $data);
    }
    public function create() {
        return view('index');
    }
    public function store(Request $request) {
        $validateData = $this->validate($request, [
    		'name' => 'required',
            'address' => 'required',
            'email' => 'required|unique:employees',
            'phone' => 'required|numeric',
            'dob' => 'required',
            'image' => 'required|image|mimes:png,jpg',
        ]);
        if($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $fileName);
            $input = $request->all();
            $input['dob'] = date('Y-m-d', strtotime($request->input('dob')));
            $input['image'] = $fileName;
            $result = Employee::create($input);
            if($result) {
                return redirect('/')->with('success', 'Employee added successfully.');
            } else {
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        } 
    }
    public function edit($id) {
        $data = Employee::where('id', $id)->first()->toArray();
        return view('index', compact('data','id'));
    }
    public function update($id, Request $request) {
        $this->validate($request, [
    		'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'image' => 'image|mimes:png,jpg',
        ]);
        if($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $fileName);
            $input['image'] = $fileName;
        } 
        $input['name'] = $request->input('name');
        $input['address'] = $request->input('address');
        $input['email'] = $request->input('email');
        $input['phone'] = $request->input('phone');
        $input['dob'] = date('Y-m-d', strtotime($request->input('dob')));
        $result = Employee::where('id', $id)->update($input);
        if($result) {
            return redirect('/')->with('success', 'Employee updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    public function delete($id) {
        $data = Employee::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Employee deleted successfully.');
    }
    public function search($name) {
        $data = Employee::where('name', 'like', '%'.$name.'%')->paginate(10);
        return view('list')->with('data', $data);
    }
}
