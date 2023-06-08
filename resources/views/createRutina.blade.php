@extends('layouts.app')

@section('content')

<div class="container">
    <a href="/rutina" class="text-white text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        <span class="demo-text" style=>Volver</span>
        <br>
        <br>
    </a>
    <div class="container blanco" style="color: white; background: transparent">
        <h1 class="text-center">Crear Rutina de Entrenamiento</h1>
        <form method="post" action="{{ route('rutina.store') }}">
            @csrf
            <div class="form-group row">
                

            <div class="col-md-6">
    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" required autocomplete="nombre" autofocus>

    @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>
<div class="col-md-6">
    <label for="nivel" class="col-md-4 col-form-label text-md-right">{{ __('Nivel') }}</label>
    <select id="nivel" class="form-control @error('nivel') is-invalid @enderror" name="nivel" required>
        <option value="Scaled">Scaled</option>
        <option value="Intermedio">Intermedio</option>
        <option value="RX">RX</option>
    </select>

    @error('nivel')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
            <div class="form-group" style="color: white">
            <br>
                <label for="ejercicios">Selecciona los ejercicios:</label>
                <br>
                <br>
                <div class="row">
                    @foreach($ejercicios as $ejercicio)
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ejercicios[]" value="{{ $ejercicio->id }}" id="ejercicio_{{ $ejercicio->id }}">
                                <label class="form-check-label" for="ejercicio_{{ $ejercicio->id }}">
                                    {{ $ejercicio->nombre }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="form-group row mb-0"  style="text-align:center">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Añadir') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
