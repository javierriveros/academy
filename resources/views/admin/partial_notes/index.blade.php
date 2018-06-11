@extends('layouts.app') 
@section('content')
@include('partials.page-header', ['title' => 'Notas Parciales'])
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            @if (Auth::user()->isAdmin() && $partialNotes->sum('percentage') < 100)
                <div class="text-center">
                    <a href="{{ route('course.partial_notes.create', $course) }}" class="btn btn-success ml-auto mr-auto mb-4" title="Nuevo nota parcial">Añadir nota parcial</a>
                </div>
            @endif
            <table class="table table-hover table-responsive-sm">
                <caption>Lista de notas parciales de {{ $course->name }}</caption>
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Porcentaje</th>
                        <th colspan="5">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partialNotes as $pn)
                        <tr>
                            <th scope="row">{{ $pn->id }}</th>
                            <td>{{ $pn->name }}</td>
                            <td>{{ $pn->percentage }}%</td>
                            <td>
                                <a href="{{ route('course.partial_notes.edit', [$course, $pn]) }}" class="btn btn-sm btn-info" title="Editar"><i class="fa fa-pencil-alt"></i></a>
                            </td>
                            <td>
                                @include('admin.partial_notes.delete', [$course, $pn])
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th scope="row">-</th>
                        <td>Total:</td>
                        <td><strong>{{ $partialNotes->sum('percentage') }}%</strong></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection