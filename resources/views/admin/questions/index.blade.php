@extends('layouts.app') 
@section('content')
@include('partials.page-header', ['title' => 'Todos las preguntas'])
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            <table class="table table-hover table-responsive-sm">
                <caption>Lista de preguntas</caption>
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Curso</th>
                        <th>Usuario</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <th scope="row">{{ $question->id }}</th>
                            <td>{{ $question->title }}</td>
                            <td><a href="{{ route('courses.show', $question->course) }}">{{ $question->course->name }}</a></td>
                            <td>{{ $question->user->name }}</td>
                            <td>
                                <a href="{{ route('course.questions.edit', [$question->course_id, $question]) }}" class="btn btn-sm btn-info" title="Editar"><i class="fa fa-pencil-alt"></i></a>
                            </td>
                            <td>
                                {{-- @include('course.questions.delete', $question) --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{-- {!! $questions->links() !!} --}}
            </div>
        </div>
    </div>
</div>
@endsection