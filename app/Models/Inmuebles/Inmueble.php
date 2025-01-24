<?php

namespace App\Models\Inmuebles;

use App\Models\Parametros\Municipio;
use App\Models\Parametros\Regional;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Inmueble extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'inmuebles';
    protected $guarded = [];

    //==================================================================================
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipo()
    {
        return $this->belongsTo(TipoInmuebles::class, 'tipo_inmueble_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function regional()
    {
        return $this->belongsTo(Regional::class, 'regional_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function multimedia()
    {
        return $this->hasMany(Multimedia::class, 'inmuebles_id', 'id');
    }
    //---------------------------------------------------------------
}
