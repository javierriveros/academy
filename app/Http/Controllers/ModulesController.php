<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModule;
use App\Module;
use App\Course;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isTeacherOwner');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $module = new Module;
        return view('admin.modules.create', ['module' => $module])->withCourse($course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreModule|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModule $request, Course $course)
    {
        $module = new Module($request->all());
        $module->course()->associate($course);
        $module->user()->associate(auth()->user());

        if($module->save()) {
            flash('Se ha guardado el módulo')->success();
            return redirect()->route('courses.show', $course);
        } else {
            return view('admin.modules.create', compact('module'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Module $module)
    {
        return view('admin.modules.edit', compact('module'))->withCourse($course);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreModule|Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(StoreModule $request, Course $course, Module $module)
    {
        $module->title = $request->get('title');
        $module->description = $request->get('description');

        if($module->save()) {
            flash('Se ha actualizado el módulo')->success();
            return redirect()->route('courses.show', [$module->course]);
        } else {
            return view('admin.modules.edit', compact('module'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Module $module)
    {
        flash('Se ha eliminado el módulo')->success();
        $module->delete();
        return redirect()->route('courses.show', [$module->course]);
    }
}
