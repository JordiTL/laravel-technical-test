<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
     * Return profile editor view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return view('pages/profile/main')->with('user', Auth::user());
    }
}
