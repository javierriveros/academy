<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourse;
use App\Http\Requests\UpdateCourse;
use App\Course;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $courses = Course::latest()->paginate(1);
        $courses = Course::latest()->get();
        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course;
        $course->sentence = "El conejo brinca";
        return view('courses.create', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCourse|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourse $request)
    {
        $course = new Course($request->all());
        $course->user()->associate(auth()->user());
        $this->storeImage($request, $course);

        if($course->save()) {
            return redirect()->route('courses.show', $course);
        } else {
            return view('courses.create', ['course' => $course]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course->sentence = 'El conejo brinca';
        return view('courses.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCourse|Request $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourse $request, Course $course)
    {        
        $course->name = $request->get('name');
        $course->description = $request->get('description');
        
        $this->storeImage($request, $course);

        if($course->save()) {
            return redirect()->route('courses.index');
        } else {
            return view('courses.edit', ['course' => $course]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }

    /**
     * Guarda la imagen en disco y asigna su ruta al curso.
     *
     * @param Request $request
     * @param $course
     */
    private function storeImage(Request &$request, &$course)
    {
        $picture = $request->file('picture');
        if ($picture) {
            $new_name = md5($course->name . time()) . '.' . $picture->getClientOriginalExtension();
            $picture->move('uploads/courses/', $new_name);
            $course->picture = 'uploads/courses/' . $new_name;
        }
    }
}
