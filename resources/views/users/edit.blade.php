@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar usuario</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="current_profile_photo">Foto de perfil actual</label><br>
                                <img src="{{ asset($user->profile_photo_path) }}" alt="Foto de Perfil Actual" style="max-width: 200px; max-height: 200px;">
                            </div>
                            
                            <div class="form-group">
                                <input id="profile_photo_path" type="file" class="form-control-file @error('profile_photo_path') is-invalid @enderror" name="profile_photo_path" accept="image/*">
                            
                                @error('profile_photo_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Nueva Contraseña</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>                 

                            <div class="form-group">
                                <label for="rol_id">Rol</label>
                                <select id="rol_id" class="form-control @error('rol_id') is-invalid @enderror" name="rol_id" required>
                                    <option value="">Seleccionar Rol</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->rol_id == $role->id ? 'selected' : '' }}>{{ $role->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('rol_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
