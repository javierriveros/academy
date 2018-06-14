<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourse;
use App\Http\Requests\UpdateCourse;
use App\Course;
use App\HasCourse;
use App\Question;
use App\Answer;
use App\User;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isTeacherOwner')->only(['store', 'edit', 'update', 'destroy']);
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
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the all courses
     */
    public function indexAdmin(Request $request) {
        if (Auth::user()->isAdmin())
            $courses = Course::latest()->paginate(10);
        else
            $courses = Course::where('teacher_id', Auth::user()->id)->paginate(10);
        return view('admin.courses.index', compact('courses'));
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
        $teachers = User::teachers()->pluck('name', 'id');
        //dd($teachers);
        return view('admin.courses.create', compact('course', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCourse|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourse $request)
    {
        //dd($request);
        $course = new Course($request->all());
        $course->teacher_id = $request->get('teacher_id');
        $course->user()->associate(auth()->user());
        $this->storeImage($request, $course);

        if($course->save()) {
            return redirect()->route('courses.show', $course);
        } else {
            return view('admin.courses.create', compact('course'));
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
        $newQuestion =  new Question;
        $newAnswer = new Answer;
        $course->isEnrolled = HasCourse::where([
            ['student_id', '=', Auth::user()->id],
            ['course_id', '=', $course->id]
        ])->count() == 1 ? true : false;
        return view('courses.show', compact('course', 'newQuestion', 'newAnswer'));
    }

    /**
     * Enroll a student in the specified course
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function enroll(Course $course)
    {
        $has_course = new HasCourse;
        $has_course->course()->associate($course);
        $has_course->student()->associate(Auth::user());
        if ($has_course->save()) {
            flash('Ha sido matriculado en el curso')->success();
            return back();
        } else {
            return back();
        }
    }

    /**
     * Unenroll a student form a specified course
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function unenroll(Course $course)
    {
        $has_course = HasCourse::where([
            ['student_id', '=', Auth::user()->id],
            ['course_id', '=', $course->id]
        ]);
        $has_course->delete();
        flash('Has sido retirado del curso')->success();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $teachers = User::teachers()->pluck('name', 'id');
        $course->sentence = 'El conejo brinca';
        return view('admin.courses.edit', compact('course', 'teachers'));
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
        
        if ($request->has('picture'))
            $this->storeImage($request, $course);

        if($course->save()) {
            return redirect()->route('admin.courses.index');
        } else {
            return view('admin.courses.edit', compact('course'));
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
        return redirect()->route('admin.courses.index');
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
