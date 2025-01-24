<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Parametros\Departamento;
use App\Models\Parametros\Regional;
use Illuminate\Http\Request;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = Regional::get();
        return view('intranet.parametros.regionales.index', compact('regionales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::get();
        return view('intranet.parametros.regionales.crear',compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['regional'] = ucfirst(strtolower($request['regional']));
        Regional::create($request->all());
        return redirect('parametros/regionales')->with('mensaje', 'Regional creada con éxito');
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
        $regional_edit = Regional::findOrFail($id);
        $departamentos = Departamento::get();
        return view('intranet.parametros.regionales.editar', compact('regional_edit','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request['regional'] = ucfirst(strtolower($request['regional']));
        if (isset($request['estado'])) {
            $request['estado'] = 1;
        } else {
            $request['estado'] = 0;
        }
        Regional::findOrFail($id)->update($request->all());
        return redirect('parametros/regionales')->with('mensaje', 'Regional actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $regional = Regional::findOrFail($id);
            if ($regional->areas->count() > 0 ) {
                return response()->json(['mensaje' => 'ng']);
            } else {
                if (Regional::destroy($id)) {
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
