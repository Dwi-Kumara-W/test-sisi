<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{

    public function index()
    {
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'Index Level Employee',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);

        $employee = Employee::get();

        // dd($employee);

        return view('employee.index', [
            'employees' => $employee
        ]);
    }

    public function create()
    {
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'Created Employee',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);
        return view('employee.add-employee');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'wa' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {

            alert::success('Berhasil', 'Employee telah ditambahkan!');

            $newPassword = Hash::make($request->password);

            $request['password'] = $newPassword;

            $employee = Employee::create($request->all());

            return redirect('/master-employees');
        }
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employee.show-employee', [
            'employee' => $employee
        ]);
    }

    public function destroy($id)
    {
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'Deleted Employees',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);

        // $deleteMark = [
        //     'deleted_mark' => Auth::user()->id
        // ];

        // Employee::where('id', $id)->update($deleteMark);

        alert::success('Berhasil', 'Berhasil menghapus user!');

        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'Updated employee',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);

        $employee = Employee::findOrFail($id);

        return view('employee.edit-employee', [
            'employee' => $employee
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'wa' => 'required',
            'jabatan' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {

            alert::success('Berhasil', 'Employee telah diupdate!');

            $password = $request->get('password');

            $employee = Employee::findOrFail($id);

            $employee->update($request->all());

            return redirect('/master-employees');
        }
    }

}
