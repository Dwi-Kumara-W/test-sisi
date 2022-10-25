<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuUser;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\UserFoto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use RealRashid\SweetAlert\Facades\Alert;

class UsersManagementController extends Controller
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

        $user = User::all();
        $menu = Menu::join('menu_levels as ml', 'ml.id', '=', 'menus.id_level')->get();

        return view('admin.users.index', [
            'user' => $user,
            'menu' => $menu
        ]);
    }

    public function role(Request $request, $id)
    {
        Alert::success('Berhasil', 'Role Berhasil ditambahkan');
        $data = [
            'id_user' => $request->get('id_user'),
            'menu_id' => $request->get('menu_id')
        ];

        MenuUser::insert($data);

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'Created User',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);
        return view('admin.users.create');
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
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'wa' => 'required',
            'pin' => 'required',
            'jenis_kelamin' => 'required',
            'status_user' => 'required'
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {

            alert::success('Berhasil', 'User telah ditambahkan!');

            $password = $request->get('password');

            $user = new User();

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = bcrypt($password);
            $user->no_hp = $request->get('no_hp');
            $user->wa = $request->get('wa');
            $user->pin = $request->get('pin');
            $user->jenis_kelamin = $request->get('jenis_kelamin');
            $user->status_user = $request->get('status_user');
            $user->created_by = Auth::user()->id;

            $user->save();

            return redirect()->route('userManagement.index');
        }
    }

    public function avatar(Request $request, $id)
    {
        Alert::success('Berhasil', 'Berhasil mengupload foto');

        UserFoto::create([
            'id_user' => $id,
            'foto' => request('foto')->store('avatar'),
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $avatar = UserFoto::where('id_user', $id)->get();

        // dd($avatar);
        return view('admin.users.show', [
            'user' => $user,
            'avatar' => $avatar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'Updated user',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);

        $user = User::findOrFail($id);

        return view('admin.users.edit', [
            'user' => $user
        ]);
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
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'wa' => 'required',
            'pin' => 'required',
            'jenis_kelamin' => 'required',
            'status_user' => 'required'
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {

            alert::success('Berhasil', 'User telah diupdate!');

            $password = $request->get('password');

            $user = User::findOrFail($id);

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = bcrypt($password);
            $user->no_hp = $request->get('no_hp');
            $user->wa = $request->get('wa');
            $user->pin = $request->get('pin');
            $user->jenis_kelamin = $request->get('jenis_kelamin');
            $user->status_user = $request->get('status_user');
            $user->updated_by = Auth::user()->id;

            $user->save();

            return redirect()->route('userManagement.index');
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
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'Deleted User',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);
        $deleteMark = [
            'deleted_mark' => Auth::user()->id
        ];
        User::where('id', $id)->update($deleteMark);

        alert::success('Berhasil', 'Berhasil menghapus user!');

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }
}
