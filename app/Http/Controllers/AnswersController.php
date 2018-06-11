<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnswer;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAnswer|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswer $request, Course $course, Question $question)
    {
        $answer = new Answer($request->all());
        $answer->question()->associate($question);
        $answer->user()->associate(auth()->user());

        if($answer->save()) {
            flash('Respuesta guardada')->success();
            return redirect()->route('courses.show', $course);
        } else {
            flash('Error')->error();
            return view('course.show')->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Question $question, Answer $answer)
    {
        return view('answers.edit', compact('question', 'answer'))->withCourse($course);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Question $question, Answer $answer)
    {
        $answer->content = $request->get('content');

        if($answer->save()) {
            flash('Respuesta actualizada')->success();
            return redirect()->route('courses.show', [$answer->question->course]);
        } else {
            return view('answers.edit')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Question $question, Answer $answer)
    {
        $answer->delete();
        return redirect()->route('courses.show', [$answer->question->course]);
    }
}
