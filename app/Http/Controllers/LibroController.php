<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all();

        return view('libros.index',['libros' => $libros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = ['exito' =>''];

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'titulo'      => 'required|string|max:255',
                'autor'       => 'required|string|max:255',
                'anho'        => 'required|integer',
                'genero'      => 'required|string|max:255',
                'descripcion' => 'required|string|max:1255',
            ]);

            $libro = new Libro();

            
            $libro->titulo      = $request->input('titulo');;
            $libro->autor       = $request->input('autor');;
            $libro->anho        = $request->input('anho');;
            $libro->genero      = $request->input('genero');;
            $libro->descripcion = $request->input('descripcion');

            $libro->save();   
            
            $data['exito'] = 'Operación realiza correctamente';

        }


        return view('libros.create',['datos' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'titulo'      => 'required|string|max:255',
            'autor'       => 'required|string|max:255',
            'anho'        => 'required|integer',
            'genero'      => 'required|string|max:255',
            'descripcion' => 'required|string|max:1255',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->titulo      = $request->input('titulo');
        $libro->autor       = $request->input('autor');
        $libro->anho        = $request->input('anho');
        $libro->genero      = $request->input('genero');
        $libro->descripcion = $request->input('descripcion');
        $libro->save();

        return redirect()->route('libro.index')
            ->with('success', 'Libro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libro.index')
            ->with('success', 'Libro eliminado correctamente');
    }
}