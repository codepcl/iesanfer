<?php

namespace App\Http\Controllers;

use App\Asistencia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    //Mostrar todos los registros
    public function showAll()
    {
        return response()->json(Asistencia::all());
    }

    public function showOne($id)
    {
        return response()->json(Asistencia::find($id));
    }

    // Crear un nuevo registro
    public function create(Request $request)
    {
        
        try {
            $asistencia = Asistencia::create($request->all());
            return response()->json($asistencia, 201);
        }catch ( \Exception $e){
            return response()->json(['message' => 'Asistencia Registration Failed!'], 409);
        }
    }

    public function delete($id)
    {
        Asistencia::findOrFail($id)->delete();
        return response()->json(array("status" => 200, "mensaje" => "Se elimino extiosamente"), 200);
        // return response('Se eliminó exitosamente', 200);
    }

    public function update($id, Request $request)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->update($request->all());

        return response()->json($asistencia, 200);
    }

    public function updateEstado($id, Request $request)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->update($request->all());

        return response()->json($asistencia, 200);
    }

    // TODO: Realizar el insert desde la app    
    public function sync(Request $request)
    {
        //$asistencia = Asistencia::create($request)
    }
    
}
