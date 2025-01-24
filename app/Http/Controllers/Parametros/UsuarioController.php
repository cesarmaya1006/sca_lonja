<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Config\TipoDocumento;
use App\Models\Parametros\Regional;
use App\Models\Parametros\Usuario;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = Regional::get();
        $user = User::findOrFail(session('id_usuario'));
        return view('intranet.parametros.usuarios.index', compact('regionales', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regionales = Regional::get();
        $tiposdocu = TipoDocumento::get();
        return view('intranet.parametros.usuarios.crear', compact('regionales', 'tiposdocu',));
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
        $empleado_new = Usuario::create([
            'id' => $usuario_new->id,
            'regional_id' => $request['regional_id'],
            'tipo_documento_id' => $request['tipo_documento_id'],
            'identificacion' => $request['identificacion'],
            'nombres' => ucwords(strtolower($request['nombres'])),
            'apellidos' => ucwords(strtolower($request['apellidos'])),
            'telefono' => $request['telefono']
        ]);

        return redirect('parametros/usuarios')->with('mensaje', 'Usuario creado con éxito');
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
        $usuario_edit = Usuario::findOrFail($id);

        return view('intranet.parametros.usuarios.editar', compact('regionales','usuario_edit','tiposdocu'));
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
        $usuario_editar->usuario->update([
            'regional_id' => $request['regional_id'],
            'tipo_documento_id' => $request['tipo_documento_id'],
            'identificacion' => $request['identificacion'],
            'nombres' => ucwords(strtolower($request['nombres'])),
            'apellidos' => ucwords(strtolower($request['apellidos'])),
            'telefono' => $request['telefono'],
            'estado' => $request['estado']
        ]);

        return redirect('parametros/usuarios')->with('mensaje', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getUsuariosRegional(Request $request)
    {
        if ($request->ajax()) {
            $regional_id = $_GET['id'];
            return response()->json(['usuarios' => Usuario::with('tipo_docu')
                ->with('usuario')->where('regional_id', $regional_id)->get()]);
        } else {
            abort(404);
        }
    }
}
