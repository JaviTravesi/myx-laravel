@extends('layouts.app')

@section('content')

<div class="container">
    <a href="/usuario" class="text-white text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        <span class="demo-text" style=>Volver</span>
        <br>
        <br>
    </a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="color:white; background: transparent; border: 2px solid rgba(255,255,255,0.5); border-radius: 20px; backdrop-filter: blur(15px);">
                <div class="card-header">{{ __('Editar contraseña') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuario/update/password',$user->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Introduce la nueva contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="r_password" class="col-md-4 col-form-label text-md-right">{{ __(' Repetir Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="r_password" type="password" class="form-control @error('r_password') is-invalid @enderror" name="r_password" required autocomplete="new-password" placeholder="Repite la contraseña">

                                @error('r_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
						</div>
                        <br>
                        <div class="form-group row mb-0"  style="text-align:center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
