@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Nuevo nota parcial</h1>

        <div class="card">
            <div class="card-body">
                @include('admin.partial_notes.form', ['partial_note' => $partialNote, 'course' => $course, 'route' => ['course.partial_notes.store', $course], 'method' => 'POST'])
            </div>
        </div>
    </div>
@endsection