@extends('layouts.app') 
@section('content')
@include('partials.page-header', ['title' => 'Todos los cursos'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                @foreach($courses as $course)
                <tbody>
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td><a href="{{ route('courses.show', $course) }}">{{ $course->name }}</a></td>
                        <td>
                            <a href="{{ route('admin.courses.create', $course) }}" class="btn btn-sm btn-success">Añadir módulo</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-info">Editar</a>
                        </td>
                        <td>
                            @include('admin.courses.delete', $course)
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="d-flex justify-content-center">
                {!! $courses->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection