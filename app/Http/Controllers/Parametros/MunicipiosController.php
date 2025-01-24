<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Parametros\Departamento;
use App\Models\Parametros\Municipio;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = Municipio::get();
        return view('intranet.parametros.municipios.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::get();
        return view('intranet.parametros.municipios.crear', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Municipio::create($request->all());
        return redirect('parametros/municipios')->with('mensaje', 'Municipio creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $municipio_edit = Municipio::findOrFail($id);
        $departamentos = Departamento::get();
        return view('intranet.parametros.municipios.editar', compact('municipio_edit', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Municipio::findOrFail($id)->update($request->all());
        return redirect('parametros/municipios')->with('mensaje', 'Municipios actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->ajax()) {

            if (Municipio::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
