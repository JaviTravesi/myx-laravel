<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\ejercicio;
use App\Models\rutina;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function getUsers()
        {
            $user = User::all();
            return response()->json($user);
        }
    
    
    // /**
    //  * Create User
    //  * @param Request $request
    //  * @return User 
    //  */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required','string','max:255',
                'email' => 'required','string','email', 'max:255',
                'password' => 'required','string','max:8',
                'direccion' => 'required','string','max:255',
                'edad' => 'required','integer',
                'peso' => 'required','integer',
                'altura' => 'required','integer',
                'tipo' => 'required','string',
                'nivel' => 'required','string',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => now(),
                'password' => Hash::make($request->password),
                'direccion' => $request->direccion,
                'edad' => $request->edad,
                'peso' => $request->peso,
                'altura' => $request->altura,
                'tipo' => $request->tipo,
                'nivel' => $request->nivel,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $success['token'] = $user->createToken('MyX')->accessToken;
            $success['name'] = $user->name;
            $success['message'] = 'Usuario Creado Correctamente';
            return response()->json(['success' => $success], $this->successStatus);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    


    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->direccion = $request->input('direccion');
        $user->edad = $request->input('edad');
        $user->peso = $request->input('peso');
        $user->altura = $request->input('altura');
        $user->tipo = $request->input('tipo');
        $user->save();

        return response()->json($user);
    }

    public $successStatus = 200;

    public function register(Request $request) {
        $validateUser = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:8',
            'direccion' => 'required|string|max:255',
            'edad' => 'required|integer',
            'peso' => 'required|integer',
            'altura' => 'required|integer',
            'nivel' => 'required|string',
        ]);

        if($validateUser->fails()) {
        
            return response()->json(['error' => $validateUser->errors()], 401); 

        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'direccion' => $request->direccion,
            'edad' => $request->edad,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'tipo' => 'Atleta',
            'nivel' => $request->nivel,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $success['token'] = $user->createToken('MyX')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success' => $success], $this->successStatus);
    }
    
       

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $token = $user->createToken('MyX')->accessToken;
            $tipo = $user['tipo'];
            $id = $user['id'];
            return response()->json(['success' => 'ok','token'=>$token,'tipo'=>$tipo,'id_usuario'=>$id], 200);
        }
        else {
            return response()->json(['error' => 'No estss autorizado'], 401);
        }
        
    }
    public function deleteUser($id)
    {
        $user = user::find($id);
        $user->delete();
        return response()->json($user);
    }
    // EJERCICIOS
    public function getEjercicios()
    {
        $ejercicio = Ejercicio::orderBy('created_at', 'desc')->get();
        return response()->json($ejercicio);
    }
    //CREAR
    public function createEjercicio(Request $request)
    {
       
        $ejercicio = new ejercicio;
        $ejercicio->nombre = $request->input('nombre');
        $ejercicio->n_reps = $request->input('n_reps');
        $ejercicio->n_rondas = $request->input('n_rondas');
        $ejercicio->save();

        return response()->json($ejercicio);
    }
    //ACTUALIZAR
    public function updateEjercicio(Request $request, $id)
    {
        $ejercicio = Ejercicio::find($id);
        $ejercicio->nombre = $request->input('nombre');
        $ejercicio->n_reps = $request->input('n_reps');
        $ejercicio->n_rondas = $request->input('n_rondas');
        $ejercicio->save();
        return response()->json($ejercicio);
    }
    // BORRAR
    public function deleteEjercicio(Request $request, $id)
    {
        $ejercicio = Ejercicio::find($id);
        $ejercicio->delete();
        return response()->json($ejercicio);
    }

    //RUTINAS
    public function getRutinas()
    {
        $consulta = DB::table('rutinaxejercicios')
        ->join('rutinas', 'rutinaxejercicios.rutina_id', '=', 'rutinas.id')
        ->join('ejercicios', 'rutinaxejercicios.ejercicio_id', '=', 'ejercicios.id')
        ->select('ejercicios.nombre as ejercicio_nombre','rutinas.nombre as rutina_nombre','rutinas.id as rutina_id','rutinas.nivel as nivel')
        ->get();
        return response()->json($consulta);
    }

    //RUTINAS RANDOM 
    public function getRutinasRandom()
    {
        $rutinaScaled = Rutina::where('nivel', 'Scaled')->inRandomOrder()->first();
        $rutinaIntermedio = Rutina::where('nivel', 'Intermedio')->inRandomOrder()->first();
        $rutinaRX = Rutina::where('nivel', 'RX')->inRandomOrder()->first();

        $rutinas = [
            'Scaled' => $rutinaScaled,
            'Intermedio' => $rutinaIntermedio,
            'RX' => $rutinaRX,
    ];

    return response()->json($rutinas);
    }
    //CREAR
    public function createRutina(Request $request)
    {
        $rutina = new rutina;
        $rutina->nombre = $request->input('nombre');
        $rutina->tipo = $request->input('tipo');
        $rutina->created_at = now();
        $rutina->updated_at= now();
        $rutina->save();
       
        $ultimoId = DB::table('rutinas')->max('id');
        
        $ejercicios = $request->input('ejercicios');
        foreach($ejercicios as $ejercicio){
            $rutinaxejercicio= new rutinaxejercicio;
            $rutinaxejercicio->rutina_id = $ultimoId;
            $rutinaxejercicio->ejercicio_id = intval($ejercicio);
            $rutinaxejercicio->created_at = now();
            $rutinaxejercicio->updated_at = now();
            $rutinaxejercicio->save();
        }

        return response()->json($rutina);
    }
    
    //ACTUALIZAR NO LO METÍ

    //BORRAR
    public function deleteRutina($id)
    {
        $rutina = rutina::find($id);
        $rutina->delete();
        return response()->json($rutina);
    }


    public function getUser($id){
        $user = User::find($id);
        return response()->json($user);
    }

    public function getEjercicio($id){
        $ejercicio = Ejercicio::find($id);
        return response()->json($ejercicio);
    }

    public function getRutinax($id_usuario){
        $usuario = User::find($id_usuario);
        $nivel = $usuario['nivel'];
        $fecha = now()->format('Y-m-d');
        $consulta = DB::table('rutinas')
            ->join('rutinaxejercicios', 'rutinaxejercicios.rutina_id', '=', 'rutinas.id')
            ->join('ejercicios', 'rutinaxejercicios.ejercicio_id', '=', 'ejercicios.id')
            ->select('ejercicios.nombre', 'ejercicios.n_reps', 'ejercicios.n_rondas', 'ejercicios.video')
            ->where('rutinas.nivel', '=', $nivel)
            ->whereDate('rutinas.created_at', '=', $fecha)
            ->get();
        return response()->json($consulta);
    }

}
