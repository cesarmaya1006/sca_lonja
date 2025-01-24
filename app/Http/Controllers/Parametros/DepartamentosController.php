<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Parametros\Departamento;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = Departamento::get();
        return view('intranet.parametros.departamentos.index',compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('intranet.parametros.departamentos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Departamento::create($request->all());
        return redirect('parametros/departamentos')->with('mensaje', 'Departamento creado con éxito');
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
        $departamento_edit = Departamento::findOrFail($id);
        return view('intranet.parametros.departamentos.editar',compact('departamento_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Departamento::findOrFail($id)->update($request->all());
        return redirect('parametros/departamentos')->with('mensaje', 'Departamento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->ajax()) {
            $departamento = Departamento::findOrFail($id);
            if ($departamento->municipios->count() > 0) {
                return response()->json(['mensaje' => 'ng']);
            } else {
                if (Departamento::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            }
        } else {
            abort(404);
        }
    }
}
