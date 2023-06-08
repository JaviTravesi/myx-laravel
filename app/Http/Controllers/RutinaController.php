<?php

namespace App\Http\Controllers;

use App\Models\rutina;
use App\Models\ejercicio;
use App\Models\rutinaxejercicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Contollers\get;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

use Redirect;
use Auth;
use Hash;
use Hashids;

class RutinaController extends Controller
{

    public function index()
    {
        $consulta = DB::table('rutinaxejercicios')
        ->join('rutinas', 'rutinaxejercicios.rutina_id', '=', 'rutinas.id')
        ->join('ejercicios', 'rutinaxejercicios.ejercicio_id', '=', 'ejercicios.id')
        ->select('ejercicios.nombre as ejercicio_nombre','rutinas.nombre as rutina_nombre','rutinas.id as rutina_id', 'rutinas.nivel')
        ->orderBy('rutinaxejercicios.created_at', 'desc')
        ->get();
        return view('rutina', ['resultado' => $consulta]);
        
    }

    protected function validator(array $data){
        return Validator::make($data,[
            'nombre' => ['required','string','max:255'],
            'tipo' => ['nullable','string'],
            'nivel' => ['required', 'string'],
        ]);    
    }

    public function store(Request $request)
    {
        $rutina = new rutina;
        $rutina->nombre = $request->input('nombre');
        $rutina->nivel = $request->input('nivel');
        $rutina->created_at = now();
        $rutina->updated_at= now();
        $rutina->save();
       
        $ultimoId = DB::table('rutinas')->max('id');
       
        $ejercicios = $request->input('ejercicios');
        foreach($ejercicios as $ejercicio){
            $rutinaxejercicio= new rutinaxejercicio;
            $rutinaxejercicio->rutina_id = $ultimoId;
            $rutinaxejercicio->ejercicio_id = intval($ejercicio);
            $rutina->nivel = $request->input('nivel');
            $rutinaxejercicio->created_at = now();
            $rutinaxejercicio->updated_at = now();
            $rutinaxejercicio->save();
        }

        return redirect()->route('rutina')->with('success', 'rutina añadida exitosamente');
    }

    public function show($id)
    {
        $rutina = rutina::find($id);
        return view('verrutina', compact('rutina'));
    }

    public function destroy($id)
    {
    $rutina = Rutina::find($id);
    $rutina->delete();

    return redirect()->route('rutina')->with('success', 'Rutina eliminada en cascada exitosamente');
    }
}
