<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use HasApiTokens;

    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'fecha_nacimiento' => 'required|date',
            'ci' => 'required',
            'password' => 'required|min:6',
        ]);

        // Crear un nuevo usuario y asignar los valores
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->fecha_nacimiento = $request->input('fecha_nacimiento');
        $user->ci = $request->input('ci');
        $user->password = bcrypt($request->input('password')); // Hashear la contraseña antes de guardarla
        $user->save();

        // Crear una respuesta JSON con un mensaje y el usuario creado
        $data = [
            'message' => 'Usuario creado',
            'usuario' => $user,
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscar el usuario por ID
        $user = User::findOrFail($id);
        // Respuesta JSON con el usuario encontrado
        return response()->json(['usuario' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'fecha_nacimiento' => 'required|date',
            'ci' => 'required',
            'password' => 'required|min:6',
        ]);

        // Buscar el usuario por ID
        $user = User::findOrFail($id);

        // Actualizar los campos del usuario con los datos de la solicitud
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->fecha_nacimiento = $request->input('fecha_nacimiento');
        $user->ci = $request->input('ci');
        $user->password = bcrypt($request->input('password'));

        // Guardar los cambios
        $user->save();

        // Respuesta JSON
        return response()->json(['message' => 'Usuario actualizado', 'usuario' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar el usuario por ID
        $user = User::findOrFail($id);

        // Eliminar el usuario
        $user->delete();

        // Respuesta JSON
        return response()->json(['message' => 'Usuario eliminado']);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']]);

        if(Auth::attempt($credentials)){
            $user=Auth::user();
            $toker=$user->createToken('token')->plainTextToken;
            $cookie  = cookie('cookie_token',$toker,60*24);
            return response(["token"=>$toker] , Response::HTTP_OK)->withoutCookie($cookie);
        }else{
            return response(Response::HTTP_UNAUTHORIZED);
        }

    }

}
