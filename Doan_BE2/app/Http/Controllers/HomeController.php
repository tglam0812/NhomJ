<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function page(Request $request, $page="index")
    {
        
      //hiển thị tên tài khoản đăng nhập
        $user = Auth::user() == '' ? [] : User::where('user_id', Auth::user()->user_id)->get();
        return view($page, compact('user'));
    }
}
