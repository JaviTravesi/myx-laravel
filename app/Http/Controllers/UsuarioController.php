<?php

namespace App\Http\Controllers;

use App\Models\User;

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

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::where('tipo', '<>', 'admin')->latest()->get();
        return view('usuario',['users' => $usuarios]);
        
    }
    
    protected function validator(array $data){
        return Validator::make($data,[
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email', 'max:255'],
            'password' => ['required','string','max:8'],
            'direccion' => ['required','string','max:255'],
            'edad' => ['required','integer'],
            'peso' => ['required','integer'],
            'altura' => ['required','integer'],
            'tipo' => ['required','string'],
            'nivel' => ['required','string']

        ]);    
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->direccion = $request->input('direccion');
        $user->edad = $request->input('edad');
        $user->peso = $request->input('peso');
        $user->altura = $request->input('altura');
        $user->tipo = $request->input('tipo');
        $user->nivel = $request->input('nivel');
        $user->save();

        return redirect()->route('usuario.index')->with('success', 'Usuario añadido exitosamente');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('verUser', compact('user'));
    }
    public function show_edit(Request $request)
    {
        $id = $request->id;
        $usuario = User::find($id);
        return view('editUser', ['user' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->direccion = $request->input('direccion');
        $user->edad = $request->input('edad');
        $user->peso = $request->input('peso');
        $user->altura = $request->input('altura');
        $user->tipo = $request->input('tipo');
        $user->nivel = $request->input('nivel');
        $user->save();

        return redirect()->route('usuario.index')->with('success', 'Usuario actualizado exitosamente');
    }

    public function updatepassword(Request $request, $id)
    {
        if($request->input('password')== $request->input('r_password')){
            $user = User::find($id);
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect()->route('usuario.index')->with('success', 'Usuario actualizado exitosamente');
        }else{
            return redirect()->route('usuario.index')->with('error', 'Error actualizando contraseña');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('mensaje', 'El usuario ha sido eliminado correctamente.');
        return redirect()->route('usuario.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
