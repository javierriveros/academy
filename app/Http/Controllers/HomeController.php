<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\HasCourse;

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
        $courses = Course::latest()->paginate(4);
        return view('unauthenticated', ['courses' => $courses]);
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        if (\Auth::user()->isTeacher()) {
            return redirect()->route('admin.dashboard');
        }
        $courses = Course::whereIn('id', function($query) {
            $query->select('course_id')
            ->from(with(new HasCourse)->getTable())
            ->where('student_id', 1);
        })->get();
        
        return view('home', ['courses' => $courses]);
    }
}
