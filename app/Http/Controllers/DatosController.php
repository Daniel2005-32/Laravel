<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DatosController extends Controller
{
    function procesar(Request $request){
        $procesar = Validator::make($request->all(),[
            'nombre' => 'required|string',
            'edad' => 'required|integer',
        ]);

        if ($procesar->fails()) {
            return response()->json([
                'message' => 'El formulario esta incorrecto',
                'errors' => $procesar-> errors()
            ],400);
        };

        $nombre = $request->input('nombre');
        $edad = $request->input('edad');
        
        return response()->json([
            'message' => "Hola [$nombre]. Tienes [$edad] años."
        ]);
    }

};