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
        $libros = Libro::paginate(10);

        return view('libros.index',['libros' => $libros,'cods_genero' => Libro::$cods_genero]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // En el método create(), modifica la parte cuando se procesa el POST:

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

            $libro->titulo      = $request->input('titulo');
            $libro->autor       = $request->input('autor');
            $libro->anho        = $request->input('anho');
            $libro->genero      = $request->input('genero');
            $libro->descripcion = $request->input('descripcion');

            $libro->save();   
            
            // CAMBIO: Redirigir al listado de libros con mensaje de éxito
            return redirect()->route('libro.index')
                ->with('success', 'Libro creado correctamente');
        }

        $libro = new Libro();

        return view('libros.create',[
            'datos' => $data,
            'libro' => $libro,
            'cods_genero' => Libro::$cods_genero, 
            'disabled' => '',
            'oper' => 'create'
        ]);
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
        $datos = ['exito' => ''];
        $libro = Libro::find($id);

        return view('libros.create',['libro' => $libro,'datos' => $datos,'cods_genero' => Libro::$cods_genero, 'disabled' => 'disabled','oper' => 'show']);
    }



    public function edit(Request $request, string $id='')
    {
        if ($request->isMethod('post')) {   

            $validated = $request->validate([
                'titulo'      => 'required|string|max:255',
                'autor'       => 'required|string|max:255',
                'anho'        => 'required|integer',
                'genero'      => 'required|string|max:255',
                'descripcion' => 'required|string|max:1255',
            ]);

            $datos_save = [];
            
            $datos_save['titulo']       = $request->input('titulo');
            $datos_save['autor']        = $request->input('autor');
            $datos_save['anho']         = $request->input('anho');
            $datos_save['genero']       = $request->input('genero');
            $datos_save['descripcion']  = $request->input('descripcion');

            Libro::where('id', $request->input('id'))->update($datos_save);
            
            // CAMBIO: Obtener el libro actualizado y mostrar vista de consulta
            $libro = Libro::find($request->input('id'));
            $datos['exito'] = 'Libro actualizado correctamente';
            
            // Mostrar la vista de create pero con campos deshabilitados (modo consulta)
            return view('libros.create',[
                'libro' => $libro,
                'datos' => $datos,
                'cods_genero' => Libro::$cods_genero, 
                'disabled' => 'disabled', // Campos deshabilitados
                'oper' => 'show' // Cambiar a modo show/consulta
            ]);
        }
        else
        {
            $datos = ['exito' => ''];
            $libro = Libro::find($id);
            
            return view('libros.create',[
                'libro' => $libro,
                'datos' => $datos,
                'cods_genero' => Libro::$cods_genero, 
                'disabled' => '', // Campos habilitados para edición
                'oper' => 'edit'
            ]);
        }
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