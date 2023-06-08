<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{ 
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login_home(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // return Redirect::to("http://127.0.0.1:8000/vistaAdmin");

            // una vez nos logueamos como Administrador, nos lleva a la vista del Admin.
            return view('vistaAdmin');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function formulario()
    {
        return view('register');
    }
    protected $redirectTo ='/login';

    protected function validator(array $data){
        return Validator::make($data,[
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email', 'max:255', 'unique:users'],
            'password' => ['required','string','max:100'],
            'direccion' => ['required','string','max:255'],
            'edad' => ['required','integer'],
            'peso' => ['required','integer'],
            'altura' => ['required','integer'],
            'tipo' => ['required','string'],

        ]);    
    }
    protected function create (array $data){
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => $data['email_verified_at'],
            'password' => Hash::make($data['password']),
            'direccion' => $data['direccion'],
            'edad' => $data['edad'],
            'peso' => $data['peso'],
            'altura' => $data['altura'],
            'tipo' => $data['tipo'],
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at']
        ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @param array $data
     * @return \App\User
     */
    public function register(Request $request)
    {
        // llamamos a la funcion 'validator', que se encarga de validar los datos del formulario de registro y devuelve un objeto 'Validator' con los resultados de esta.
        $this->validator($request->all())->validate();
        // llamamos a la función 'create' que nos crea al nuevo usuario en la BBDD
        $user = $this->create($request->all());
        // guuarda los cambios en la BBDD
        $user->save();
        
        $redirectTo ='/register';

        // una vez registramos a un usuario siendo Admin, nos lleva a la vista del Admin.
        return view('vistaAdmin');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}