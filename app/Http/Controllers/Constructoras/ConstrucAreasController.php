<?php

namespace App\Http\Controllers\Constructoras;

use App\Http\Controllers\Controller;
use App\Models\Constructoras\ConstrucAreas;
use App\Models\Parametros\Regional;
use Illuminate\Http\Request;

class ConstrucAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = Regional::get();
        return view('intranet.constructoras.areas.index', compact('regionales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regionales = Regional::get();
        return view('intranet.constructoras.areas.crear', compact('regionales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['area'] = ucfirst(strtolower($request['area']));
        ConstrucAreas::create($request->all());
        return redirect('parametros/empresas_areas')->with('mensaje', 'Área Compañia creada con éxito');
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
        $area_edit = ConstrucAreas::findOrFail($id);
        $regionales = Regional::get();

        return view('intranet.constructoras.areas.editar', compact('regionales', 'area_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request['area'] = ucfirst(strtolower($request['area']));
        ConstrucAreas::findOrFail($id)->update($request->all());
        return redirect('parametros/empresas_areas')->with('mensaje', 'Área Compañia actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $area = ConstrucAreas::findOrFail($id);
            if ($area->cargos->count() > 0 || $area->areas->count() > 0) {
                return response()->json(['mensaje' => 'ng']);
            } else {
                if (ConstrucAreas::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            }
        } else {
            abort(404);
        }
    }

    public function getAreas(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['areasPadre' => ConstrucAreas::with('area_sup')->with('areas')->where('constructora_id', $_GET['id'])->get()]);
        } else {
            abort(404);
        }
    }

    public function getDependencias(Request $request, $id)
    {
        if ($request->ajax()) {
            return response()->json(['dependencias' => ConstrucAreas::where('area_id', $id)->get()]);
        } else {
            abort(404);
        }
    }
}
