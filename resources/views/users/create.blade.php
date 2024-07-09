@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear usuario</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmar contraseña</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="profile_photo_path">Foto de perfil</label>
                                <input id="profile_photo_path" type="file" class="form-control-file @error('profile_photo_path') is-invalid @enderror" name="profile_photo_path" accept="image/*">
                            
                                @error('profile_photo_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                            <div class="form-group">
                                <label for="rol_id">Rol</label>
                                <select id="rol_id" class="form-control @error('rol_id') is-invalid @enderror" name="rol_id" required>
                                    <option value="">Selecciona rol</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('rol_id') == $role->id ? 'selected' : '' }}>{{ $role->nombre }}</option>
                                    @endforeach
                                </select>
                            
                                @error('rol_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                            <button type="submit" class="btn btn-primary">Crear usuario</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
