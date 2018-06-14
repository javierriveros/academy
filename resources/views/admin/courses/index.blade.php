@extends('layouts.app') 
@section('content')
@include('partials.page-header', ['title' => 'Todos los cursos'])
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            @if (Auth::user()->isAdmin())
                <div class="text-center">
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-success ml-auto mr-auto mb-4" title="Nuevo curso">Nuevo curso</a>
                </div>
            @endif
            <table class="table table-hover table-responsive-sm">
                <caption>Lista de cursos</caption>
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="5">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <th scope="row">{{ $course->id }}</th>
                            <td><a href="{{ route('courses.show', $course) }}">{{ $course->name }}</a></td>
                            <td>
                                <a href="{{ route('admin.modules.create', $course) }}" class="btn btn-sm btn-success" title="Añadir módulo">Añadir módulo</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.topics.create', $course) }}" class="btn btn-sm btn-success" title="Añadir tema">Añadir tema</a>
                            </td>
                            <td>
                                <a href="{{ route('course.partial_notes.index', $course) }}" class="btn btn-sm btn-info" title="Administrar notas">Notas parciales</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-info" title="Editar"><i class="fa fa-pencil-alt"></i> <span class="d-none d-lg-inline-block">Editar curso</span></a>
                            </td>
                            <td>
                                @include('admin.courses.delete', $course)
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $courses->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection