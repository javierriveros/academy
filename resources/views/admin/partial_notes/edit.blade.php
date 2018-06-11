@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Editar nota: {{ $partialNote->name }}</h1>

        <div class="card">
            <div class="card-body">
                @include('admin.partial_notes.form', ['partial_note' => $partialNote, 'course' => $course, 'route' => ['course.partial_notes.update', $course, $partialNote], 'method' => 'PUT'])
            </div>
        </div>
    </div>
@endsection