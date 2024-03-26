<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {

        $employees = Employee::all();//toate elementele din baza
        return view('index', compact('employees'));
    }

    //salvam in baza datele introduse in formular, trimise cu ajax
    public function store(Request $request) {
       $employee = new Employee;

       $employee->name = $request->input('name');
       $employee->email = $request->input('email');
       $employee->address = $request->input('address');

       $employee->save();
     }

     public function update(Request $request) {
          $employee = Employee::find($request->id);
          $employee->name = $request->input('name2');
          $employee->email = $request->input('email2');
          $employee->address = $request->input('address2');

          $employee->save();
          return $employee;
     }

     public function delete(Request $request) {
        $employee = Employee::find($request->id);
        $employee->delete();
        return $employee;
     }
}
