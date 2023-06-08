<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    public function mostrarGrafica()
    {
        $nivelScaled = DB::table('users')->where('nivel', '=', 'Scaled')->count();
        $nivelIntermedio = DB::table('users')->where('nivel', '=', 'Intermedio')->count();
        $nivelRX = DB::table('users')->where('nivel', '=', 'RX')->count();

        $data = [
            'nivelScaled' => $nivelScaled,
            'nivelIntermedio' => $nivelIntermedio,
            'nivelRX' => $nivelRX,
        ];
        
        return view('grafica', $data);
}
    
}
