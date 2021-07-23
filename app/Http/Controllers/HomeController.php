<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        if (Auth::user()->type == "admin") {
            //$category = Course_category::all();
            return view('admin.site_admin.admin.member')->with([
                'url' => 'member'
                //'category'=>$category
            ]);
        } else {
            return redirect('member/task');
        }

    }
}
