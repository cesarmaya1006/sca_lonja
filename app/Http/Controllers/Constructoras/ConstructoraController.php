<?php

namespace App\Http\Controllers\Constructoras;

use App\Http\Controllers\Controller;
use App\Models\Config\TipoDocumento;
use App\Models\Constructoras\Constructora;
use App\Models\Parametros\Regional;
use App\Models\User;
use Illuminate\Http\Request;

class ConstructoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = Regional::get();
        $user = User::findOrFail(session('id_usuario'));
        return view('intranet.constructoras.empresas.index', compact('regionales', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regionales = Regional::get();
        $tiposdocu = TipoDocumento::get();
        return view('intranet.constructoras.empresas.crear', compact('regionales', 'tiposdocu',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empresa_new = Constructora::create([
            'regional_id' => $request['regional_id'],
            'tipo_documento_id' => $request['tipo_documento_id'],
            'identificacion' => $request['identificacion'],
            'constructora' => ucwords(strtolower($request['constructora'])),
            'contacto' => ucwords(strtolower($request['contacto'])),
            'email' => $request['email'],
            'telefono' => $request['telefono']
        ]);

        return redirect('parametros/companias')->with('mensaje', 'Empresa creada con éxito');
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
        $regionales = Regional::get();
        $tiposdocu = TipoDocumento::get();
        $empresa_edit = Constructora::findOrFail($id);

        return view('intranet.constructoras.empresas.editar', compact('regionales','empresa_edit','tiposdocu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request['estado'])) {
            $request['estado'] = 1;
        } else {
            $request['estado'] = 0;
        }

        // - - - - - - - - - - - - - - - - - - - - - - - -
        $empresa_editar = Constructora::findOrFail($id);
        // - - - - - - - - - - - - - - - - - - - - - - - -
        $empresa_editar->update([
            'regional_id' => $request['regional_id'],
            'tipo_documento_id' => $request['tipo_documento_id'],
            'identificacion' => $request['identificacion'],
            'constructora' => ucwords(strtolower($request['constructora'])),
            'contacto' => ucwords(strtolower($request['contacto'])),
            'email' => $request['email'],
            'telefono' => $request['telefono'],
            'estado' =>$request['estado']
        ]);

        return redirect('parametros/companias')->with('mensaje', 'Empresa actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getCompaniasRegional(Request $request){
        if ($request->ajax()) {
            return response()->json(['empresas' => Constructora::with('areas')->where('regional_id',$_GET['id'])->get()]);
        } else {
            abort(404);
        }
    }
}
