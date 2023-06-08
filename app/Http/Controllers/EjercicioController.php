<?php

namespace App\Http\Controllers;

use App\Models\ejercicio;

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

class EjercicioController extends Controller
{
    public function index()
    {
        $ejercicio = Ejercicio::orderBy('created_at', 'desc')->get();
        return view('ejercicio',['ejercicios' => $ejercicio]);
    }

    public function create()
    {
        return view('ejercicio.create');
    }

    protected function validator(array $data){
        return Validator::make($data,[
            'nombre' => ['required','string','max:255'],
            'n_reps' => ['required','integer'],
            'n_rondas' => ['required','integer'],

        ]);    
    }

    public function store(Request $request)
    {
       
        $ejercicio = new ejercicio;
        $ejercicio->nombre = $request->input('nombre');
        $ejercicio->n_reps = $request->input('n_reps');
        $ejercicio->n_rondas = $request->input('n_rondas');
        $ejercicio->video = $request->input('video');
        $ejercicio->save();

        return redirect('/ejercicio')->with('success', 'Ejercicio añadido con éxito');
    }

    public function show($id)
    {
        $ejercicio = Ejercicio::find($id);

        return view('verEjercicio', compact('ejercicio'));
    }
    public function show_edit_ejercicio(Request $request, $id)
    {
        $ejercicio = Ejercicio::find($id);

        return view('editEjercicio', compact('ejercicio'));
    }


    public function update(Request $request, $id)
    {
        $ejercicio = Ejercicio::find($id);
        $ejercicio->nombre = $request->input('nombre');
        $ejercicio->n_reps = $request->input('n_reps');
        $ejercicio->n_rondas = $request->input('n_rondas');
        $ejercicio->video = $request->input('video');
        $ejercicio->save();

        return redirect()->route('ejercicio')->with('success', 'Ejercicio actualizado exitosamente');
    }

    public function destroy($id)
    {
        $ejercicio = Ejercicio::find($id);
        $ejercicio->delete();

        return redirect('/ejercicio')->with('success', 'Ejercicio eliminado con éxito');
    }
}
