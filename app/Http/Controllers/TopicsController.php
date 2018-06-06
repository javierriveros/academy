<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopic;
use App\Topic;
use App\Module;
use App\Course;
use Illuminate\Http\Request;

class TopicsController extends Controller
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
    public function create(Course $course)
    {
        $topic = new Topic;
        $modules = $course->modules()->pluck('title', 'id');
        return view('admin.topics.create', compact('modules', 'topic'))->withCourse($course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTopic|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopic $request, Course $course)
    {
        $topic = new Topic($request->except('_token'));
        $topic->module_id = $request->get('module_id');
        $topic->user()->associate(auth()->user());

        if($topic->save()) {
            return redirect()->route('topics.show', $topic);
        } else {
            return view('admin.topics.create', compact('topic'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Topic $topic)
    {
        $modules = $course->modules()->pluck('title', 'id');
        return view('admin.topics.edit', compact('topic', 'modules'))->withCourse($course);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreTopic|Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTopic $request, Course $course, Topic $topic)
    {
        $topic->title = $request->get('title');
        $topic->content = $request->get('content');

        if($topic->save()) {
            return redirect()->route('courses.show', [$topic->module->course]);
        } else {
            return view('admin.topics.edit', compact('topic'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Topic $topic)
    {
        $topic->delete();
        return redirect()->route('courses.show', [$topic->module->course]);
    }
}
