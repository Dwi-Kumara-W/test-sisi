<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activity = [
            'id_user' => Auth::user()->id,
            'descripsi' => 'At Menu Home',
            'status' => Auth::user()->status_user,
            'menu_id' => 1,
            'created_at' => Carbon::now()
        ];
        UserActivity::insert($activity);

        $userActivity = UserActivity::join('users', 'users.id', '=', 'user_activities.id_user')
            ->limit(5)
            ->orderByDesc('user_activities.created_at')
            ->get();

        return view('home', [
            'userActivity' => $userActivity
        ]);
    }
}
