<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Config\TipoDocumento;
use App\Models\Parametros\Arquitecto;
use App\Models\Parametros\Regional;
use App\Models\User;
use Illuminate\Http\Request;

class ArquitectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = Regional::get();
        $user = User::findOrFail(session('id_usuario'));
        return view('intranet.parametros.arquitectos.index', compact('regionales', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regionales = Regional::get();
        $tiposdocu = TipoDocumento::get();
        return view('intranet.parametros.arquitectos.crear', compact('regionales', 'tiposdocu',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario_new = User::create([
            'name' => strtolower($request['nombres']) . ' ' . strtolower($request['apellidos']),
            'email' => strtolower($request['email']),
            'password' => bcrypt(utf8_encode($request['identificacion'])),
        ])->syncRoles('Empleado');
        // - - - - - - - - - - - - - - - - - - - - - - - -
        $arquitecto_new = Arquitecto::create([
            'id' => $usuario_new->id,
            'regional_id' => $request['regional_id'],
            'tipo_documento_id' => $request['tipo_documento_id'],
            'identificacion' => $request['identificacion'],
            'nombres' => ucwords(strtolower($request['nombres'])),
            'apellidos' => ucwords(strtolower($request['apellidos'])),
            'telefono' => $request['telefono']
        ]);

        return redirect('parametros/arquitectos')->with('mensaje', 'Arquitecto creado con éxito');
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
        $arquitecto_edit = Arquitecto::findOrFail($id);

        return view('intranet.parametros.arquitectos.editar', compact('regionales','arquitecto_edit','tiposdocu'));
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

        $nombres_array = explode(' ', ucwords(strtolower($request['nombres'])));
        $apellidos_array = explode(' ', ucwords(strtolower($request['apellidos'])));
        // - - - - - - - - - - - - - - - - - - - - - - - -
        $usuario_editar = User::findOrFail($id);
        $usuario_editar->update([
            'name' => ucwords(strtolower($nombres_array[0])) . ' ' . ucwords(strtolower($apellidos_array[0])),
            'email' => strtolower($request['email']),
        ]);
        // - - - - - - - - - - - - - - - - - - - - - - - -
        $usuario_editar->arquitecto->update([
            'regional_id' => $request['regional_id'],
            'tipo_documento_id' => $request['tipo_documento_id'],
            'identificacion' => $request['identificacion'],
            'nombres' => ucwords(strtolower($request['nombres'])),
            'apellidos' => ucwords(strtolower($request['apellidos'])),
            'telefono' => $request['telefono'],
            'estado' => $request['estado']
        ]);

        return redirect('parametros/arquitectos')->with('mensaje', 'Arquitecto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getArquitectosRegional(Request $request)
    {
        if ($request->ajax()) {
            $regional_id = $_GET['id'];
            return response()->json(['arquitectos' => Arquitecto::with('tipo_docu')
                ->with('usuario')->where('regional_id', $regional_id)->get()]);
        } else {
            abort(404);
        }
    }
}
