<?php

namespace App\Http\Controllers;

use App\PartialNote;
use App\Http\Requests\StorePartialNote;
use App\Course;
use Illuminate\Http\Request;

class PartialNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        
        $partialNotes = PartialNote::where('course_id', $course->id)->get();
        
        return view('admin.partial_notes.index', compact('partialNotes', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $partialNote = new PartialNote;
        return view('admin.partial_notes.create', compact('partialNote'))->withCourse($course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePartialNote|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartialNote $request, Course $course)
    {
        $partialNote = new PartialNote($request->all());
        $partialNote->course()->associate($course);

        if($partialNote->save()) {
            return redirect()->route('course.partial_notes.index', $course);
        } else {
            return view('course.partial_notes.create')->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PartialNote  $partialNote
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, PartialNote $partialNote)
    {
        return view('admin.partial_notes.edit', compact('partialNote'))->withCourse($course);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StorePartialNote|Request  $request
     * @param  \App\PartialNote  $partialNote
     * @return \Illuminate\Http\Response
     */
    public function update(StorePartialNote $request, Course $course, PartialNote $partialNote)
    {
        $partialNote->name = $request->get('name');
        $partialNote->percentage = $request->get('percentage');

        if($partialNote->save()) {
            return redirect()->route('course.partial_notes.index', [$partialNote->course]);
        } else {
            return view('course.partial_notes.edit')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PartialNote  $partialNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, PartialNote $partialNote)
    {
        $partialNote->delete();
        return redirect()->route('course.partial_notes.index', [$partialNote->course]);
    }
}
