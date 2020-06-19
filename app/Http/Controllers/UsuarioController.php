<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Usuario;

class UsuarioController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {
        return response()->json(['usuario' => Auth::user()], 200);
    }

    /**
     * Get all User.
     *
     * @return Response
     */
    public function allUsers()
    {
         return response()->json(['usuarios' =>  Usuario::all()], 200);
    }

    /**
     * Get one user.
     *
     * @return Response
     */
    public function singleUser($id)
    {
        try {
            $user = Usuario::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

    public function delete($id)
    {
        Usuario::findOrFail($id)->delete();
        return response()->json(array("status" => 200, "mensaje" => "Se elimino extiosamente"), 200);
        // return response('Se eliminó exitosamente', 200);
    }

    public function update($id, Request $request)
    {
                try {
                   
                    $user = Usuario::findOrFail($id);
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

    public function updateEstado($id, Request $request)
    {
        $periodo = Usuario::findOrFail($id);
        $periodo->update($request->all());

        return response()->json($periodo, 200);
    }

}