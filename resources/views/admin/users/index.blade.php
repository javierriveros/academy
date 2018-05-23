@extends('layouts.app') 
@section('content')
    @include('partials.page-header', ['title' => 'Todos los usuarios'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <table class="table">
                <thead>
                    <tr>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->rol() }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user) }}">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection