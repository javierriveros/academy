<?php

namespace App\Http\Controllers;

use App\Question;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestion;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->get();
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreQuestion|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestion $request, Course $course)
    {
        //dd($request);
        $question = new Question($request->all());
        $question->course()->associate($course);
        $question->user()->associate(auth()->user());

        if($question->save()) {
            flash('Pregunta guardada')->success();
            return redirect()->route('courses.show', $course);
        } else {
            flash('Error')->error();
            return view('course.show')->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Question $question)
    {
        return view('questions.edit', compact('question'))->withCourse($course);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreQuestion|Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestion $request, Course $course, Question $question)
    {
        $question->title = $request->get('title');
        $question->content = $request->get('content');

        if($question->save()) {
            flash('Pregunta actualizada')->success();
            return redirect()->route('courses.show', [$question->course]);
        } else {
            return view('questions.edit')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Question $question)
    {
        flash('Pregunta eliminada')->success();
        $question->delete();
        return redirect()->route('courses.show', [$question->course]);
    }
}
