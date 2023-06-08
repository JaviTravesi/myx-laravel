@extends('layouts.app')

@section('content')

<div class="container">
    <a href="/ejercicio" class="text-white text-decoration-none">
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
                <div class="card-header">{{ __('Editar ejercicio') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ejercicio.update',$ejercicio->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  required autocomplete="nombre" autofocus value="{{$ejercicio->nombre}}">

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="n_reps" class="col-md-4 col-form-label text-md-right">{{ __('n_reps') }}</label>

                            <div class="col-md-6">
                                <input id="n_reps" type="number" class="form-control @error('n_reps') is-invalid @enderror" name="n_reps" required autocomplete="n_reps" autofocus value="{{$ejercicio->n_reps}}">

                                @error('n_reps')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="n_rondas" class="col-md-4 col-form-label text-md-right">{{ __('n_rondas') }}</label>

                            <div class="col-md-6">
                                <input id="n_rondas" type="number" class="form-control @error('n_rondas') is-invalid @enderror" name="n_rondas" required autocomplete="n_rondas" autofocus value="{{$ejercicio->n_rondas}}">

                                @error('n_rondas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Vídeo') }}</label>

                            <div class="col-md-6">
                                <input id="video" type="text" class="form-control @error('video') is-invalid @enderror" name="video" required autocomplete="video" autofocus value="{{$ejercicio->video}}>

                                @error('video')
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
