@extends('layouts.app') 

@section('title') Lista de usuarios
@endsection

@section('content')
    @include('partials.page-header', ['title' => 'Todos los usuarios'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            <table class="table table-hover table-responsive-sm">
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
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-info" title="Editar"><i class="fa fa-pencil-alt"></i> <span class="d-none d-lg-inline-block">Editar usuario</span></a>
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