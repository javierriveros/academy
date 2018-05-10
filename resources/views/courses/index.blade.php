@extends('layouts.app')

@section('content')
    <div class="big-padding blue-grey text-center white-text bottom-space">
        <h1>Cursos</h1>
    </div>

    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>
                            <a href="{{ url('courses/' . $course->id) }}">{{$course->name}}</a>
                        </td>
                        <td>{{$course->description}}</td>
                        <td>
                            <a href="{{ url('courses/' . $course->id . '/edit') }}">Editar</a>

                            @include('courses.delete', ['course' => $course])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection