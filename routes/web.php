<?php

use App\Http\Controllers\Config\MenuController;
use App\Http\Controllers\Config\MenuRolController;
use App\Http\Controllers\Config\PermisoController;
use App\Http\Controllers\Config\PermisoRolController;
use App\Http\Controllers\Config\RolController;
use App\Http\Controllers\Constructoras\ConstrucAreasController;
use App\Http\Controllers\Constructoras\ConstructoraController;
use App\Http\Controllers\Extranet\ExtranetPageController;
use App\Http\Controllers\Intranet\IntranetPageController;
use App\Http\Controllers\Parametros\AreaController;
use App\Http\Controllers\Parametros\ArquitectoController;
use App\Http\Controllers\Parametros\CargoController;
use App\Http\Controllers\Parametros\DepartamentosController;
use App\Http\Controllers\Parametros\EmpleadoController;
use App\Http\Controllers\Parametros\MunicipiosController;
use App\Http\Controllers\Parametros\RegionalController;
use App\Http\Controllers\Parametros\UsuarioController;
use App\Http\Middleware\Administrador;
use App\Http\Middleware\AdminSistema;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {return view('welcome');});

//Route::get('/', function () {return view('extranet.welcome');});
Route::get('/', [ExtranetPageController::class, 'index'])->name('index_extranet');
Route::get('/login_page', [ExtranetPageController::class, 'login_page'])->name('login_page');
Route::get('/login', [ExtranetPageController::class, 'login'])->name('login');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', [IntranetPageController::class, 'dashboard'])->name('dashboard');
    Route::prefix('configuracion_sis')->middleware(AdminSistema::class)->group(function(){
        Route::controller(MenuController::class)->prefix('menu')->group(function () {
            Route::get('', 'index')->name('menu.index');
            Route::get('crear', 'create')->name('menu.create');
            Route::get('editar/{id}', 'edit')->name('menu.edit');
            Route::post('guardar', 'store')->name('menu.store');
            Route::put('actualizar/{id}', 'update')->name('menu.update');
            Route::get('eliminar/{id}', 'destroy')->name('menu.destroy');
            Route::get('guardar-orden', 'guardarOrden')->name('menu.ordenar');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Roles
        Route::controller(RolController::class)->prefix('rol')->group(function () {
            Route::get('', 'index')->name('rol.index');
            Route::get('crear', 'create')->name('rol.create');
            Route::get('editar/{id}', 'edit')->name('rol.edit');
            Route::post('guardar', 'store')->name('rol.store');
            Route::put('actualizar/{id}', 'update')->name('rol.update');
            Route::delete('eliminar/{id}', 'destroy')->name('rol.destroy');
        });
        // ----------------------------------------------------------------------------------------
        /* Ruta Administrador del Sistema Menu Rol*/
        Route::controller(MenuRolController::class)->prefix('menu_rol')->group(function () {
            Route::get('', 'index')->name('menu.rol.index');
            Route::post('guardar', 'store')->name('menu.rol.store');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Permisos Roles
        Route::controller(PermisoController::class)->prefix('permiso_rutas')->group(function () {
            Route::get('', 'index')->name('permiso_rutas.index');
        });
        /* Ruta Administrador del Sistema Menu Rol*/
        Route::controller(PermisoRolController::class)->prefix('_permiso-rol')->group(function () {
            Route::get('', 'index')->name('permisos_rol.index');
            Route::post('guardar', 'store')->name('permisos_rol.store');
            Route::get('excepciones/{permission_id}/{role_id}', 'excepciones')->name('permisos_rol.excepciones');
            Route::post('guardar_excepciones', 'store_excepciones')->name('permisos_rol.store_excepciones');
        });
        // ----------------------------------------------------------------------------------------
        // ------------------------------------------------------------------------------------
    });

    Route::prefix('parametros')->middleware(Administrador::class)->group(function(){
        // ------------------------------------------------------------------------------------
        // Ruta Departamentos
        Route::controller(DepartamentosController::class)->prefix('departamentos')->group(function () {
            Route::get('', 'index')->name('departamento.index');
            Route::get('crear', 'create')->name('departamento.create');
            Route::get('editar/{id}', 'edit')->name('departamento.edit');
            Route::post('guardar', 'store')->name('departamento.store');
            Route::put('actualizar/{id}', 'update')->name('departamento.update');
            Route::delete('eliminar/{id}', 'destroy')->name('departamento.destroy');
            Route::get('getMunicipios', 'getMunicipios')->name('departamento.getMunicipios');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Regionales
        Route::controller(RegionalController::class)->prefix('regionales')->group(function () {
            Route::get('', 'index')->name('regional.index');
            Route::get('crear', 'create')->name('regional.create');
            Route::get('editar/{id}', 'edit')->name('regional.edit');
            Route::post('guardar', 'store')->name('regional.store');
            Route::put('actualizar/{id}', 'update')->name('regional.update');
            Route::delete('eliminar/{id}', 'destroy')->name('regional.destroy');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Áreas
        Route::controller(AreaController::class)->prefix('areas')->group(function () {
            Route::get('', 'index')->name('area.index');
            Route::get('crear', 'create')->name('area.create');
            Route::get('editar/{id}', 'edit')->name('area.edit');
            Route::post('guardar', 'store')->name('area.store');
            Route::put('actualizar/{id}', 'update')->name('area.update');
            Route::delete('eliminar/{id}', 'destroy')->name('area.destroy');
            Route::get('getAreas', 'getAreas')->name('areas.getAreas');
            Route::get('getDependencias/{id}', 'getDependencias')->name('areas.getDependencias');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Cargos
        Route::controller(CargoController::class)->prefix('cargos')->group(function () {
            Route::get('', 'index')->name('cargo.index');
            Route::get('crear', 'create')->name('cargo.create');
            Route::get('editar/{id}', 'edit')->name('cargo.edit');
            Route::post('guardar', 'store')->name('cargo.store');
            Route::put('actualizar/{id}', 'update')->name('cargo.update');
            Route::delete('eliminar/{id}', 'destroy')->name('cargo.destroy');
            Route::get('getCargos', 'getCargos')->name('cargo.getCargos');
            Route::get('getAreasCargos', 'getAreasCargos')->name('cargo.getAreasCargos');
            Route::get('getCargosTodos', 'getCargosTodos')->name('cargo.getCargosTodos');
            Route::get('getAreas', 'getAreas')->name('cargo.getAreas');
            Route::get('getCargosByArea', 'getCargosByArea')->name('cargo.getCargosByArea');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Municipios
        Route::controller(MunicipiosController::class)->prefix('municipios')->group(function () {
            Route::get('', 'index')->name('municipio.index');
            Route::get('crear', 'create')->name('municipio.create');
            Route::get('editar/{id}', 'edit')->name('municipio.edit');
            Route::post('guardar', 'store')->name('municipio.store');
            Route::put('actualizar/{id}', 'update')->name('municipio.update');
            Route::delete('eliminar/{id}', 'destroy')->name('municipio.destroy');
        });
        // ------------------------------------------------------------------------------------
        // ----------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Empleados
        Route::controller(EmpleadoController::class)->prefix('empleados')->group(function () {
            Route::get('', 'index')->name('empleado.index');
            Route::get('crear', 'create')->name('empleado.create');
            Route::get('editar/{id}', 'edit')->name('empleado.edit');
            Route::post('guardar', 'store')->name('empleado.store');
            Route::put('actualizar/{id}', 'update')->name('empleado.update');
            Route::delete('eliminar/{id}', 'destroy')->name('empleado.destroy');
            Route::put('activar/{id}', 'activar')->name('empleado.activar');
            Route::get('getEmpleadosRegional', 'getEmpleadosRegional')->name('empleado.getEmpleadosRegional');
            // *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--*
        });
        // ----------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Usuarios
        Route::controller(UsuarioController::class)->prefix('usuarios')->group(function () {
            Route::get('', 'index')->name('usuario.index');
            Route::get('crear', 'create')->name('usuario.create');
            Route::get('editar/{id}', 'edit')->name('usuario.edit');
            Route::post('guardar', 'store')->name('usuario.store');
            Route::put('actualizar/{id}', 'update')->name('usuario.update');
            Route::delete('eliminar/{id}', 'destroy')->name('usuario.destroy');
            Route::put('activar/{id}', 'activar')->name('usuario.activar');
            Route::get('getUsuariosRegional', 'getUsuariosRegional')->name('usuario.getUsuariosRegional');
            // *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--*
        });
        // ----------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Arquitectos
        Route::controller(ArquitectoController::class)->prefix('arquitectos')->group(function () {
            Route::get('', 'index')->name('arquitecto.index');
            Route::get('crear', 'create')->name('arquitecto.create');
            Route::get('editar/{id}', 'edit')->name('arquitecto.edit');
            Route::post('guardar', 'store')->name('arquitecto.store');
            Route::put('actualizar/{id}', 'update')->name('arquitecto.update');
            Route::delete('eliminar/{id}', 'destroy')->name('arquitecto.destroy');
            Route::put('activar/{id}', 'activar')->name('arquitecto.activar');
            Route::get('getArquitectosRegional', 'getArquitectosRegional')->name('arquitecto.getArquitectosRegional');
            // *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--*
        });
        // ----------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Compañias
        Route::controller(ConstructoraController::class)->prefix('companias')->group(function () {
            Route::get('', 'index')->name('compania.index');
            Route::get('crear', 'create')->name('compania.create');
            Route::get('editar/{id}', 'edit')->name('compania.edit');
            Route::post('guardar', 'store')->name('compania.store');
            Route::put('actualizar/{id}', 'update')->name('compania.update');
            Route::delete('eliminar/{id}', 'destroy')->name('compania.destroy');
            Route::put('activar/{id}', 'activar')->name('compania.activar');
            Route::get('getCompaniasRegional', 'getCompaniasRegional')->name('compania.getCompaniasRegional');
            // *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--*
        });
        // ----------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Compañias
        Route::controller(ConstrucAreasController::class)->prefix('empresas_areas')->group(function () {
            Route::get('', 'index')->name('empresas_areas.index');
            Route::get('crear', 'create')->name('empresas_areas.create');
            Route::get('editar/{id}', 'edit')->name('empresas_areas.edit');
            Route::post('guardar', 'store')->name('empresas_areas.store');
            Route::put('actualizar/{id}', 'update')->name('empresas_areas.update');
            Route::delete('eliminar/{id}', 'destroy')->name('empresas_areas.destroy');
            Route::get('getAreas', 'getAreas')->name('empresas_areas.getAreas');
            Route::get('getDependencias/{id}', 'getDependencias')->name('empresas_areas.getDependencias');
            // *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--*
        });
        // ----------------------------------------------------------------------------------------
    });

    //Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});
