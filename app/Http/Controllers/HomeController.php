<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'home']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (\Auth::check())
            return redirect()->route('home');
        $courses = Course::latest()->get();
        return view('unauthenticated', ['courses' => $courses]);
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $courses = Course::latest()->limit(4)->get();
        return view('home', ['courses' => $courses]);
    }
}
