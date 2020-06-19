<?php

namespace App\Http\Controllers;

use App\Periodo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriodoController extends Controller
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
        return response()->json(Periodo::all());
    }

    public function showOne($id)
    {
        return response()->json(Periodo::find($id));
    }

    // Crear un nuevo registro
    public function create(Request $request)
    {
        $periodo = Periodo::create($request->all());
        return response()->json($periodo, 201);
    }

    public function delete($id)
    {
        Periodo::findOrFail($id)->delete();
        return response()->json(array("status" => 200, "mensaje" => "Se elimino extiosamente"), 200);
        // return response('Se eliminó exitosamente', 200);
    }

    public function update($id, Request $request)
    {
        $periodo = Periodo::findOrFail($id);
        $periodo->update($request->all());

        return response()->json($periodo, 200);
    }

    public function updateEstado($id, Request $request)
    {
        $periodo = Periodo::findOrFail($id);
        $periodo->update($request->all());

        return response()->json($periodo, 200);
    }
    
}
