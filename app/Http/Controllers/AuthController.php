<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Usuario;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'nombres' => 'required|string',
            'usuario' => 'required|string|unique:usuario',
            'documento' => 'required|string|unique:usuario',
            'password' => 'required|confirmed',
        ]);

        try {
           
            $user = new Usuario;
            $user->perfil = $request->input('perfil');
            $user->documento = $request->input('documento');
            $user->usuario = $request->input('usuario');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            $user->nombres = $request->input('nombres');
            $user->apepat = $request->input('apepat');
            $user->apemat = $request->input('apemat');
            $user->email = $request->input('email');
            $user->telefono = $request->input('telefono');
            $user->direccion = $request->input('direccion');

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

    }

         /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['usuario', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    
}