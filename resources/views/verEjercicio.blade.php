@extends('layouts.app')

@section('title', 'Usuario')

@section('content')
    <a href="/ejercicio" class="text-white text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        <span class="demo-text" style=>Volver</span>
        <br>
        <br>
    </a>
	<div class="container" style=" margin-top: 100px; float:center; text-align:center; width: 750px; position: relative;
			height: 100%;
			background: transparent;
			border: 2px solid rgba(255,255,255,0.5);
			border-radius: 20px;
			backdrop-filter: blur(15px);
			display: flex;
			justify-content: center;
			align-items: center;">
        
		<table class="table table-striped-color" style="color:white">
			<thead>
				<tr>
					<th>Nombre</th>
                    <th>Nº Repeticiones</th>
                    <th>Nº Rondas</th>
					<th>Vídeo</th>
				</tr>
			</thead>
			<tbody>
				<div style="color:white">
					<tr>
						<td>{{ $ejercicio->nombre }}</td>
						<td>{{ $ejercicio->n_reps }}</td>
                        <td>{{ $ejercicio->n_rondas }}</td>
						<td>{{ $ejercicio->video }}</td>
					</tr>
				</div>
			</tbody>
		</table>
	</div>
@endsection
