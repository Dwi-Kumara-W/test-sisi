<?php

namespace App\Http\Controllers;

use App\Models\MenuLevel;
use App\Models\UserActivity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use RealRashid\SweetAlert\Facades\Alert;

class LevelMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'Index Level Menu',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);

        $level = MenuLevel::all();

        return view('admin.menu.level.index', [
            'level' => $level
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level' => 'required'
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            alert::success('Berhasil', 'Berhasil menambah level!');

            $level = new MenuLevel();

            $level->level = $request->get('level');
            
            $level->save();

            $activity = [
                'id_user' => Auth::user()->id,
                'descripsi' => 'Created Level Menu',
                'status' => Auth::user()->status_user,
                'menu_id' => 1,
                'created_at' => Carbon::now()
            ];
            UserActivity::insert($activity);
            

            return redirect()->back();
        }
        
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
        //
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
        $validator = Validator::make($request->all(), [
            'level' => 'required'
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            alert::success('Berhasil', 'Berhasil menambah level!');

            $level = MenuLevel::findOrFail($id);

            $level->level = $request->get('level');
            
            $level->save();

            $activity = [
                'id_user' => Auth::user()->id,
                'descripsi' => 'Updated Menu',
                'status' => Auth::user()->status_user,
                'menu_id' => 1,
                'created_at' => Carbon::now()
            ];
            UserActivity::insert($activity);
            

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        alert::success('Berhasil', 'Berhasil menghapus level!');

        $level = MenuLevel::findOrFail($id);
        $level->delete();

        return redirect()->back();
    }
}
