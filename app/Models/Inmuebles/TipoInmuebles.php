<?php

namespace App\Models\Inmuebles;

use App\Models\Parametros\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TipoInmuebles extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'tipo_inmuebles';
    protected $guarded = [];

    //==================================================================================
    public function inmuebles()
    {
        return $this->hasMany(Inmueble::class, 'tipo_inmueble_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
