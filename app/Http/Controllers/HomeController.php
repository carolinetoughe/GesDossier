<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('accueil');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::guard()->User();
        return view('home', compact('user'));
    }
    public function accueil()
    {
        $data = User::get();
        return view('index',compact('data'));
    }
    public function compter()
    {
        $nbr = User::get()->count();
        return view('\layouts\approle',compact('nbr'));

    }
    
}
