<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Parametros\Area;
use App\Models\Parametros\Regional;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = Regional::get();
        return view('intranet.parametros.areas.index', compact('regionales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regionales = Regional::get();
        return view('intranet.parametros.areas.crear', compact('regionales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['area'] = ucfirst(strtolower($request['area']));
        Area::create($request->all());
        return redirect('parametros/areas')->with('mensaje', 'Área creada con éxito');
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
        $area_edit = Area::findOrFail($id);
        $regionales = Regional::get();

        return view('intranet.parametros.areas.editar', compact('regionales','area_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request['area'] = ucfirst(strtolower($request['area']));
        Area::findOrFail($id)->update($request->all());
        return redirect('parametros/areas')->with('mensaje', 'Área actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $area = Area::findOrFail($id);
            if ($area->cargos->count() > 0 || $area->areas->count()>0) {
                return response()->json(['mensaje' => 'ng']);
            } else {
                if (Area::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            }
        } else {
            abort(404);
        }
    }

    public function getAreas(Request $request){
        if ($request->ajax()) {
            return response()->json(['areasPadre' => Area::with('area_sup')->with('areas')->where('regional_id',$_GET['id'])->get()]);
        } else {
            abort(404);
        }
    }

    public function getDependencias(Request $request,$id){
        if ($request->ajax()) {
            return response()->json(['dependencias' => Area::where('area_id',$id)->get()]);
        } else {
            abort(404);
        }
    }
}
