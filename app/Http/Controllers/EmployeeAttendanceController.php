<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeAttendanceController extends Controller
{
    public function index()
    {
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'Index Level Employee Attendance',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);

        $employee = EmployeeAttendance::with('employee')->get();

        // dd($employee);

        return view('attendance.indexattendance', [
            'employees' => $employee
        ]);
    }

    public function create()
    {
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'Created Employee Attendance',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);

        $employee = Employee::get();


        return view('attendance.create-attendance', [
            'employees' => $employee
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'keterangan' => 'required'
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {

            alert::success('Berhasil', 'Attendance telah ditambahkan!');

            $employee = EmployeeAttendance::create($request->all());

            return redirect('/employee-attendance');
        }
    }
}
