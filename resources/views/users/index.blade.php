@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Crear usuario</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Foto de perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->nombre }}</td>
                        
                        <td>
                            @if ($user->profile_photo_path)
                                <img src="{{ asset($user->profile_photo_path) }}" alt="Foto de Perfil" style="width: 100px; height: auto;">
                            @else
                                No hay foto de perfil
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
