<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <style>
        canvas {
            display: block;
            margin: auto;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
    <div style="text-align:center; height: 100%;">
		<h1 class="blanco" style="text-align:center; margin-top: 20px">GRÁFICA</h1>
	</div>

	<!-- barra lateral de la izquierda -->
	
	<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark" style="float:left; position:absolute; top:0">
            <div class="d-flex flex-column  px-3 pt-2 text-white min-vh-100">
                <a href="/" class="text-white text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                    <span class="demo-text" style=>Salir</span>
                    <br>
                    <br>
                </a>
                <ul class="nav nav-pills  mb-sm-auto mb-0  " id="menu" style="width: 200px">
                    <li>
                        <h5>
                            <a href="/usuario" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people blanco" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                                </svg>
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none blanco d-sm-inline">Usuarios</span> </a>
                            <ul class="collapse show nav" id="submenu1" data-bs-parent="#menu">
                        </h5>
                    </li>
                    <li>
                        <h5>
                            <a href="/ejercicio" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bicycle blanco" viewBox="0 0 16 16">
                                    <path d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057 9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z"/>
                                </svg>
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none blanco d-sm-inline">Ejercicios</span> </a>
                            <ul class="collapse show nav" id="submenu1" data-bs-parent="#menu">
                        </h5>
                    </li>
					<li>
                        <h5>
                            <a href="/rutina" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week blanco" viewBox="0 0 16 16">
                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none blanco d-sm-inline">Rutinas</span> </a>
                        <ul class="collapse show nav" id="submenu1" data-bs-parent="#menu">
                        </h5>
                    </li>
					<li>
                        <h5>
                            <a href="/estadistica" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line blanco" viewBox="0 0 16 16">
                                    <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
                                </svg>
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none blanco d-sm-inline">Estadísticas</span> </a>
                            <ul class="collapse show nav" id="submenu1" data-bs-parent="#menu">
                        </h5>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://us.123rf.com/450wm/microphoto1981/microphoto19811712/microphoto1981171200001/90992850-icono-del-agente-gafas-de-sol-esp%C3%ADa-sombrero-y-gafas-extra%C3%B1a-persona-con-sombrero-y-gafas-oscuras.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none blanco d-sm-inline mx-1">Admin</span>
                    </a>
                </div>
            </div>
        </div>
    
    <br>
    <div class="container" style="float:center; text-align:center; width: 500px; position: relative;
        height: 450px;
        background: transparent;
        border: 2px solid rgba(255,255,255,0.5);
        border-radius: 20px;
        backdrop-filter: blur(15px);
        display: flex;
        justify-content: center;
        align-items: center;">
    
    <canvas id="usersChart"></canvas>
    <script>
        var ctx = document.getElementById('usersChart').getContext('2d');

        var usersChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Scaled', 'Intermedio', 'RX'],
                datasets: [{
                    label: 'Usuarios por nivel',
                    data: [{{$nivelScaled}}, {{$nivelIntermedio}}, {{$nivelRX}}],
                    backgroundColor: [
                        'rgba(255, 69, 0)',
                        'rgba(54, 162, 235, 1)',
                        'rgb(255, 165, 0)',
                    ],
                    borderColor: [
                        'rgba(255, 69, 0)',
                        'rgba(54, 162, 235, 1)',
                        'rgb(255, 165, 0)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {}
        });
    </script>
</div>
  
@endsection
